<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata;

	use Fawno\MetadataToolkit\Metadata\IPTC\Tag\IPTCTag;
	use Fawno\MetadataToolkit\Metadata\IPTC\Tag\IPTCTagCustomDataSCCU;

	class IPTC {
		protected const MAGIC = "\x1C";

		/**
		 * IPTC-NAA Image Resource ID
		 */
		protected const IRID = 0x0404;

		protected array $tags = [];

		protected function __construct (IPTCTag ...$tags) {
			$this->tags = $tags;
		}

		public static function create (IPTCTag ...$tags) : IPTC {
			return new static(...$tags);
		}

		public static function decode (string $bin) : IPTC {
			$tags = static::decodeTags($bin);

			return new static(...$tags);
		}

		/**
		 * @param string $bin
		 * @return array<IPTCTag>
		 */
		protected static function decodeTags (string $bin) : array {
			$tags = [];

			while (static::MAGIC == substr($bin, 0, 1)) {
				$length = 4;

				$tag = unpack('Crecord/Cid/nlength', substr($bin, 1, $length));

				if ($tag['length'] == 0x8004) {
					$length += 4;

					$tag = unpack('Crecord/Cid/nlength/Nlength', substr($bin, 1, $length));
				}

				$length += $tag['length'];

				$tags[] = IPTCTag::decode(substr($bin, 1, $length));

				$bin = substr($bin, $length + 1);
			}

			return $tags;
		}

		public function set (IPTCTag ...$tags) : IPTC {
			$this->tags = $tags;

			return $this;
		}

		public function get (?string $name = null) : null|array|IPTCTag {
			if (!$name) {
				return $this->tags;
			}

			foreach ($this->tags as $tag) {
				if ($tag::NAME == $name) {
					return $tag;
				}
			}

			return null;
		}

		protected function addSCCU (?SCCU $sccu = null) : SCCU {
			$tag = IPTCTagCustomDataSCCU::create($sccu ?? SCCU::create());
			$this->tags[] = $tag;

			return $tag->get();
		}

		public function getSCCU (bool $create = false) : ?SCCU {
			foreach ($this->tags as $tag) {
				if ($tag instanceof IPTCTagCustomDataSCCU) {
					return $tag->get();
				}
			}

			if ($create) {
				return $this->addSCCU();
			}

			return null;
		}

		public function append (IPTCTag ...$tags) : IPTC {
			$this->tags = array_merge($this->tags, $tags);

			return $this;
		}

		public function replace (IPTCTag ...$tags) : IPTC {
			$replace = array_fill_keys(array_map('get_class', $tags), true);

			foreach ($this->tags as $key => $tag) {
				if ($replace[$tag::class] ?? false) {
					unset($this->tags[$key]);
				}
			}

			return $this->append(...$tags);
		}

		public function __toString () {
			$bin = implode('', $this->tags);

			return $bin;
		}
	}
