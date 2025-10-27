<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	class JPEGSegment {
		public const NAME = null;

		protected function __construct (protected string $bin) {
		}

		public static function decode (string $bin) : static {
			return new static($bin);
		}

		public function getBin () : string {
			return $this->bin;
		}

		public function __toString () : string {
			return $this->bin;
		}
	}
