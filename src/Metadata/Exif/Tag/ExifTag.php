<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\Exif\Tag;

	class ExifTag {
		public const TAG = null;
		public const NAME = null;
		public const FORMAT = null;

		protected int $length = 0;

		protected function __construct (protected int|string $value, protected ?int $tag, protected ?int $type = null, protected ?string $format = null) {
			$this->length = strlen($value);
		}

		public static function create (int|string $value, ?int $tag = null, ?int $type = null, ?string $format = null) : static {
			return new static($value, $tag, $type, $format);
		}

		public function set (int|string $value) : static {
			$this->value = $value;

			return $this;
		}

		public function get () : int|string {
			return $this->value;
		}
	}
