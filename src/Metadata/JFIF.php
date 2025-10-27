<?php
  declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata;

	use Fawno\MetadataToolkit\Metadata\JFIF\JFIFResolutionUnit;

	class JFIF {
		/**
		 * JPEG JFIF
		 */
		public const MAGIC = "JFIF\x00";

		protected function __construct(
			protected int $version,
			protected int $resolutionUnit = JFIFResolutionUnit::PPI,
			protected int $xResolution = 72,
			protected int $yResolution = 72,
			protected int $thumbnailWidth = 0,
			protected int $thumbnailHeight = 0,
			protected string $thumbnail = '',
		) {}

		public static function decode (string $bin) : static {
			$jfif = unpack('nversion/CresolutionUnit/nxResolution/nyResolution/CthumbnailWidth/CthumbnailHeight', substr($bin, 5));
			$jfif['thumbnail'] = substr($bin, 14);

			return new static(...$jfif);
		}

		public function setResolution (int $x, int $y) : static {
			$this->xResolution = $x;
			$this->yResolution = $y;

			return $this;
		}

		public function setResolutionUnit (JFIFResolutionUnit $unit) : static {
			$this->resolutionUnit = $unit->value;

			return $this;
		}

		public function __toString () : string {
			$bin = static::MAGIC;
			$bin .= pack('n1C1n2C2', $this->version, $this->resolutionUnit, $this->xResolution, $this->yResolution, $this->thumbnailWidth, $this->thumbnailHeight);
			$bin .= $this->thumbnail;

			return $bin;
		}
	}
