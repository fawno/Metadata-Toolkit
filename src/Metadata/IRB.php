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

			while (false !== $pos = strpos(substr($bin, 0, 5), static::MAGIC)) {
				$bin = substr($bin, $pos);

				extract(unpack('nirbid/Z*name', $bin, 4));

				// Calculate offset of lenght
				$offset = 6 + (strlen($name) ?: 2);
				$offset += $offset % 2;

				extract(unpack('Nlenght', $bin, $offset));

				// Calculate lenght included IRB header
				$lenght += $offset + 4;

				$tagClass = IRBTags::getTagClass($irbid);

				$blocks[] = $tagClass::decode(substr($bin, 0, $lenght));

				$bin = substr($bin, $lenght);
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
