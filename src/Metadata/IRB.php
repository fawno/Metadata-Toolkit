<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata;

	use Fawno\MetadataToolkit\Metadata\IRB\IRBTags;
	use Fawno\MetadataToolkit\Metadata\IRB\Tag\IRBTag;

	class IRB {
		public const MARKER = "Photoshop 3.0\x00";
		public const MAGIC = '8BIM';

		protected array $blocks = [];

		protected function __construct (null|IPTC|IRBTag ...$blocks) {
			$this->blocks = $blocks;
		}

		public static function decode (string $bin) : IRB {
			$blocks = [];

			if (preg_match('~^Photoshop \d\.\d\x00$~', substr($bin, 0, 14))) {
				$bin = substr($bin, 14);
			}

			while (static::MAGIC == substr($bin, 0, 4)) {
				$app13 = unpack('a4bim/nid/n/Nlenght', $bin);

				$tagClass = IRBTags::getTagClass($app13['id']);

				$blocks[] = $tagClass::decode(substr($bin, 0, 12 + $app13['lenght']));

				$bin = substr($bin, 12 + $app13['lenght']);
			}

			return new static(...$blocks);
		}

		public static function create (null|IPTC|IRBTag ...$blocks) : IRB {
			return new static(...$blocks);
		}

		public function getIPTC () : ?IPTC {
			foreach ($this->blocks as $block) {
				if ($block instanceof IPTC) {
					return $block;
				}
			}

			return null;
		}

		public function setIPTC (IPTC $iptc) : IRB {
			foreach ($this->blocks as $key => $block) {
				if ($block instanceof IPTC) {
					$this->blocks[$key] = $iptc;

					return $this;
				}
			}

			$this->blocks[] = $iptc;

			return $this;
		}

		public function removeIPTC () : void {
			foreach ($this->blocks as $key => $block) {
				if ($block instanceof IPTC) {
					unset($this->blocks[$key]);

					return;
				}
			}
		}

		public function __toString () {
			$bin = static::MARKER;
			$bin .= implode('', $this->blocks);

			return $bin;
		}
	}
