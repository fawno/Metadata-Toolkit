<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Metadata\XMP;

	class JPEGSegmentAPP1XMP extends JPEGSegmentAPP1 {
		protected XMP $xmp;

		protected function __construct (protected string $bin) {
			$this->xmp = XMP::create(substr($bin, 33));
		}

		public static function create (XMP $xmp) : static {
			$data = (string) $xmp;
			$bin = self::MARKER;
			$bin .= pack('n', strlen($data) + 2);
			$bin .= $data;

			return new static($bin);
		}

		public function getXMP () : XMP {
			return $this->xmp;
		}

		public function __toString() : string {
			$data = (string) $this->xmp;

			$this->bin = self::MARKER;
			$this->bin .= pack('n', strlen($data) + 2);
			$this->bin .= $data;

			return $this->bin;
		}
	}
