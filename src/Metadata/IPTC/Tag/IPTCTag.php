<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	use Fawno\MetadataToolkit\Metadata\IPTC\IPTCException;
	use Fawno\MetadataToolkit\Metadata\IPTC\IPTCTags;

	class IPTCTag {
		public const MAGIC = "\x1C";
		public const TAG = null;
		public const NAME = null;
		public const FORMAT = null;

		protected function __construct (protected int|string|object $value, protected ?string $tag, protected ?string $name = null, protected ?string $format = null) {
			$this->tag = (static::TAG ?? $tag);
			if (empty($this->tag) or $this->tag != (static::TAG ?? $this->tag)) {
				throw new IPTCException('Bad tag ID');
			}

			$this->name = (static::NAME ?? $name) ?? IPTCTags::getTagName($this->tag);
			$this->format = (static::FORMAT ?? $format) ?? IPTCTags::getTagFormat($this->tag);
		}

		public static function create (int|string|object $value, ?string $tag = null, ?string $name = null, ?string $format = null) : static {
			return new static($value, $tag, $name, $format);
		}

		public static function decode (string $bin) : ?static {
			$parts = unpack('Crecord/Cid/nlength', $bin);
			if ($parts['length'] == 0x8004) {
				$parts = unpack('Crecord/Cid/nlength/Nlength', $bin);
			}

			$tag = sprintf('%u#%03u', $parts['record'], $parts['id']);
			$name = IPTCTags::getTagName($tag);
			$length = $parts['length'];

			$tagClass = str_replace('-', '', static::class . $name);
			if (static::class != $tagClass and class_exists($tagClass)) {
				return $tagClass::decode($bin);
			}

			$format = IPTCTags::getTagFormat($tag);
			$value = $length ? current(unpack($format, substr($bin, -$length))) : '';
			return static::create($value, $tag, IPTCTags::getTagName($tag), $format);
		}

		public function set (int|string|object $value) : static {
			$this->value = $value;

			return $this;
		}

		public function get () : int|string|object {
			return $this->value;
		}

		public function __toString() : string {
			$data = pack($this->format, $this->value);
			$length = strlen($data);

			$bin = self::MAGIC . pack('C*', ...explode('#', $this->tag));
			$bin .= ($length < 0x8000) ? pack('n', $length) : pack('nN', 0x8004, $length);
			$bin .= $data;

			return $bin;
		}
	}
