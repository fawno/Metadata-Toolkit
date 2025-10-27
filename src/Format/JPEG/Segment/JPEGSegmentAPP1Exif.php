<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Metadata\Exif;

	class JPEGSegmentAPP1Exif extends JPEGSegmentAPP1 {
		protected Exif $exif;

		protected function __construct (protected string $bin) {
			$this->exif = Exif::decode(substr($bin, 4));
		}

		public static function create (Exif $exif) : static {
			$data = (string) $exif;
			$bin = self::MARKER;
			$bin .= pack('n', strlen($data) + 2);
			$bin .= $data;

			return new static($bin);
		}

		public function getExif () : Exif {
			return $this->exif;
		}
	}
