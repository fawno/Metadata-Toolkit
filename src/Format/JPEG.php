<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format;

	use Exception;
	use Fawno\MetadataToolkit\Metadata\IPTC\Tag\IPTCTagCustomDataSCCU;
	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;
	use Fawno\MetadataToolkit\Format\JPEG\Segment\JPEGSegmentAPP;
	use Fawno\MetadataToolkit\Format\JPEG\Segment\JPEGSegmentAPP0;
	use Fawno\MetadataToolkit\Format\JPEG\Segment\JPEGSegmentAPP13;
	use Fawno\MetadataToolkit\Format\JPEG\Segment\JPEGSegmentAPP1Exif;
	use Fawno\MetadataToolkit\Format\JPEG\Segment\JPEGSegmentAPP1XMP;
	use Fawno\MetadataToolkit\Format\JPEG\Segment\JPEGSegmentCOM;
	use Fawno\MetadataToolkit\Format\JPEG\Segment\JPEGSegmentMetadata;
	use Fawno\MetadataToolkit\Metadata\Exif;
	use Fawno\MetadataToolkit\Metadata\IPTC;
	use Fawno\MetadataToolkit\Metadata\JFIF;
	use Fawno\MetadataToolkit\Metadata\SCCU;
	use Fawno\MetadataToolkit\Metadata\XMP;

	class JPEG {
		public const SIGNATURE = JPEGSegments::SOI;

		protected array $segments = [];

		protected function __construct (string $jpeg) {
			$offset = 0;
			$marker = self::SIGNATURE;

			while (strlen($jpeg) > 1 and $marker != JPEGSegments::EOI) {
				if ("\xFF" != $jpeg[0]) {
					throw new Exception(sprintf('JPEG is probably corrupted in offset %u. Last mark %s', $offset, bin2hex($marker)));
				}

				$size = 2;
				$marker = substr($jpeg, 0, $size);

				// Segments RST0 to RST7, SOI, EOI and TEM don't have size or data
				if ($marker != JPEGSegments::TEM and ($marker < JPEGSegments::RST0 or $marker > JPEGSegments::EOI)) {
					$size += current(unpack('nsize', substr($jpeg, 2, 2)));
				}

				// Image segment
				if ($marker == JPEGSegments::SOS) {
					$size = strpos($jpeg, JPEGSegments::EOI) ?: strlen($jpeg);
				}

				$segmentClass = JPEGSegments::getSegmentClass($marker);

				$this->segments[] = $segmentClass::decode(substr($jpeg, 0, $size));

				$jpeg = substr($jpeg, $size);

				$offset += $size;
			}
		}

		/**
		 * Reads JPEG image from a binary string
		 *
		 * @param string $jpeg Binary JPEG string
		 * @return JPEG
		 * @throws Exception
		 */
		public static function readImageBlob (string $jpeg) : JPEG {
			if (substr($jpeg, 0, 2) != self::SIGNATURE) {
				throw new Exception('Not a jpg image', 3);
			}

			return new static($jpeg);
		}

		/**
		 * Reads JPEG image from filename
		 *
		 * @param string $filename Filename of JPEG image
		 * @return JPEG
		 * @throws Exception
		 */
		public static function readImage (string $filename) : JPEG {
			if (!is_file($filename)) {
				throw new Exception('Not a file', 1);
			}

			if (false === $jpeg = file_get_contents($filename)) {
				throw new Exception('Error reading file', 2);
			}

			if (substr($jpeg, 0, 2) != self::SIGNATURE) {
				throw new Exception('Not a jpg image', 3);
			}

			return new static($jpeg);
		}

		public function removeAllMetadata () : JPEG {
			foreach ($this->segments as $key => $segment) {
				if ($segment instanceof JPEGSegmentMetadata) {
					unset($this->segments[$key]);
				}
			}

			return $this;
		}

		public function getJFIF () : ?JFIF {
			foreach ($this->segments as $segment) {
				if ($segment instanceof JPEGSegmentAPP0) {
					if ($jfif = $segment->getJFIF()) {
						return $jfif;
					}
				}
			}

			return null;
		}

		public function getExif () : ?Exif {
			foreach ($this->segments as $segment) {
				if ($segment instanceof JPEGSegmentAPP1Exif) {
					if ($exif = $segment->getExif()) {
						return $exif;
					}
				}
			}

			return null;
		}

		protected function addIPTC (?IPTC $iptc = null) : IPTC {
			$segment = JPEGSegmentAPP13::create($iptc ?? IPTC::create());
			$soi = array_shift($this->segments);
			array_unshift($this->segments, $soi, $segment);

			return $segment->getIPTC();
		}

		public function getSCCU (bool $create = false) : ?SCCU {
			return $this->getIPTC($create)->getSCCU($create);
		}

		public function getIPTC (bool $create = false) : ?IPTC {
			foreach ($this->segments as $segment) {
				if ($segment instanceof JPEGSegmentAPP13) {
					if ($iptc = $segment->getIPTC()) {
						return $iptc;
					}
				}
			}

			if ($create) {
				foreach ($this->segments as $segment) {
					if ($segment instanceof JPEGSegmentAPP13) {
						$segment->setIPTC(IPTC::create());

						return $segment->getIPTC();
					}
				}

				return $this->addIPTC();
			}

			return null;
		}

		public function removeIPTC () : JPEG {
			foreach ($this->segments as $segment) {
				if ($segment instanceof JPEGSegmentAPP13) {
					$segment->removeIPTC();
				}
			}

			return $this;
		}

		protected function addXMP (?XMP $xmp = null) : XMP {
			$segment = JPEGSegmentAPP1XMP::create($xmp ?? XMP::create());
			$soi = array_shift($this->segments);
			array_unshift($this->segments, $soi, $segment);

			return $segment->getXMP();
		}

		public function getXMP (bool $create = false) : ?XMP {
			foreach ($this->segments as $segment) {
				if ($segment instanceof JPEGSegmentAPP1XMP) {
					if ($xmp = $segment->getXMP()) {
						return $xmp;
					}
				}
			}

			if ($create) {
				return $this->addXMP();
			}

			return null;
		}

		public function removeXMP () : JPEG {
			foreach ($this->segments as $key => $segment) {
				if ($segment instanceof JPEGSegmentAPP1XMP) {
					unset($this->segments[$key]);
				}
			}

			return $this;
		}

		public function getComment () : ?string {
			foreach ($this->segments as $segment) {
				if ($segment instanceof JPEGSegmentCOM) {
					return $segment->get();
				}
			}

			return null;
		}

		public function setComment (string $comment) : JPEG {
			foreach ($this->segments as $segment) {
				if ($segment instanceof JPEGSegmentCOM) {
					$segment->set($comment);

					return $this;
				}
			}

			$soi = array_shift($this->segments);
			array_unshift($this->segments, $soi, JPEGSegmentCOM::create($comment));

			return $this;
		}

		public function removeComment () : JPEG {
			foreach ($this->segments as $key => $segment) {
				if ($segment instanceof JPEGSegmentCOM) {
					unset($this->segments[$key]);
				}
			}

			return $this;
		}

		/**
		 * Return all segments
		 *
		 * @param null|string $name Filter segments by name
		 * @return array<JPEGSegment>
		 */
		public function getSegments (?string $name = null) : array {
			return array_filter($this->segments, function($segment) use ($name) {
				return (is_null($name) or ($segment::NAME == $name));
			});
		}

		/**
		 * Return all APPx segments
		 *
		 * @return array<JPEGSegmentAPP>
		 */
		public function getSegmentsAPP () : array {
			return array_filter($this->segments, function($segment) {
				return ($segment instanceof JPEGSegmentAPP);
			});
		}

		/**
		 * Returns the JPEG image sequence as a blob
		 *
		 * Implements direct to memory image formats. It returns the JPEG image sequence as a string.
		 *
		 * @return string
		 */
		public function __toString () : string {
			return implode('', $this->segments);
		}

		/**
		 * Returns the JPEG image sequence as a blob. Alias of __toString
		 *
		 * Implements direct to memory image formats. It returns the JPEG image sequence as a string.
		 *
		 * @return string
		 */
		public function getImageBlob () : string {
			return $this->__toString();
		}

		/**
		 * Writes an image to the specified filename
		 *
		 * @param string $filename Path to the file where to write the data.
		 * @return int|false The function returns the number of bytes that were written to the file, or false on failure.
		 */
		public function writeImage (string $filename) : int|false {
			return file_put_contents($filename, $this);
		}
	}
