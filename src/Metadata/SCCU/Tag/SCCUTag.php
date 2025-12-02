<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\SCCU\Tag;

	use Fawno\MetadataToolkit\Metadata\SCCU\SCCUType;

	class SCCUTag {
		public const MAGIC = '[[';

		protected function __construct (protected int|string $value, protected string $name, protected int|SCCUType $type) {
		}

		public static function create (int|string $value, string $name, SCCUType $type) : static {
			return new static($value, $name, $type);
		}

		public static function decode (string $bin) : static {
			extract(unpack('Nlength/ntype/x4/Z*name', $bin, 2));

			$type = SCCUType::tryFrom($type) ?? $type;

			$value = substr($bin, 13 + strlen($name));

			$value = match ($type) {
				SCCUType::UINT32BE => current(unpack('N', $value)),
				SCCUType::ZSTRING => current(unpack('Z*', $value)),
				SCCUType::ZTEXT => current(unpack('Z*', $value)),
				SCCUType::DATE => $value,
				default => $value,
			};

			return new static($value, $name, $type);
		}

		public function set (int|string $value) : static {
			$this->value = $value;

			return $this;
		}

		public function get () : int|string {
			return $this->value;
		}

		public function getName () : string {
			return $this->name;
		}

		public function getType () : SCCUType {
			return $this->type;
		}

		public function __toString () {
			$type = is_int($this->type) ? $this->type : $this->type->value;

			// Pack tag name
			$data = pack('Z*', $this->name);

			// Pack tag value
			$data .= match ($this->type) {
				SCCUType::UINT32BE => pack('Nx', $this->value),
				SCCUType::ZSTRING => pack('Z*', $this->value),
				SCCUType::ZTEXT => pack('Z*', $this->value),
				SCCUType::DATE => $this->value,
				default => $this->value,
			};

			// Padding to even length
			$data = match ($this->type) {
				SCCUType::ZSTRING => strlen($data) % 2 ? $data . "\x00" : $data,
				SCCUType::ZTEXT => strlen($data) % 2 ? $data . "\x00" : $data,
				default => $data,
			};

			$sccu = static::MAGIC;
			$sccu .= pack('Nnx4', strlen($data) + 12, $type);
			$sccu .= $data;

			return $sccu;
		}
	}
