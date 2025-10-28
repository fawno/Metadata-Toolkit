<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata;

	use Fawno\MetadataToolkit\Metadata\IPTC\Tag\IPTCTag;
	use Fawno\MetadataToolkit\Metadata\IPTC\Tag\IPTCTagCustomDataSCCU;

	class IPTC {
		protected const MARKER = '8BIM';
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
			$tags = [];

			if (preg_match('~^Photoshop \d\.\d\x00$~', substr($bin, 0, 14))) {
				$bin = substr($bin, 14);
			}

			while (static::MARKER == substr($bin, 0, 4)) {
				$app13 = unpack('a4bim/nid/n/Nlenght', $bin);

				$iptc = substr($bin, 12, $app13['lenght']);

				$bin = substr($bin, 12 + $app13['lenght']);

				if ($app13['id'] != static::IRID) {
					continue;
				}

				while (static::MAGIC == substr($iptc, 0, 1)) {
					$length = 4;

					$tag = unpack('Crecord/Cid/nlength', substr($iptc, 1, $length));

					if ($tag['length'] == 0x8004) {
						$length += 4;

						$tag = unpack('Crecord/Cid/nlength/Nlength', substr($iptc, 1, $length));
					}

					$length += $tag['length'];

					$tags[] = IPTCTag::decode(substr($iptc, 1, $length));

					$iptc = substr($iptc, $length + 1);
				}
			}

			return new static(...$tags);
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
			$data = implode('', $this->tags);
			$bin = static::MARKER;
			$bin .= pack('n2N', static::IRID, 0, strlen($data));
			$bin .= $data;

			return $bin;
		}
	}
