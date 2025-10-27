<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IRB\Tag;

	class IRBTag {
		public const MARKER = '8BIM';

		protected function __construct (protected string $bin) {
		}

		public function __toString() : string {
			return $this->bin;
		}

		public static function decode (string $bin) : static {
			return new static($bin);
		}
	}
