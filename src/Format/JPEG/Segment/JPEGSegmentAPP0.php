<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

use Fawno\MetadataToolkit\Metadata\JFIF;
use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP0 extends JPEGSegmentAPP {
		public const NAME = 'APP0';
		public const DESCRIPTION = 'Application Field 0 (APP0) - usually JFIF or JFXX';
		public const MARKER = JPEGSegments::APP0;

		protected ?JFIF $jfif = null;

		protected function __construct (protected string $bin) {
			if (substr($bin, 4, 5) == JFIF::MAGIC) {
				$this->jfif = JFIF::decode(substr($bin, 4));
			}
		}

		public function getJFIF () : ?JFIF {
			return $this->jfif;
		}

		public function __toString () : string {
			if ($this->jfif) {
				$data = $this->jfif->__toString();

				$this->bin = self::MARKER;
				$this->bin .= pack('n', strlen($data) + 2);
				$this->bin .= $data;
			}

			return $this->bin;
		}
	}
