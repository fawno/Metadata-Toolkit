<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IRB\Tag;

	use Fawno\MetadataToolkit\Metadata\IPTC;

	class IRBTagIPTCData extends IPTC {
		protected const MARKER = '8BIM';

		public static function decode (string $bin) : IPTC {
			$tags = [];

			if (preg_match('~^Photoshop \d\.\d\x00$~', substr($bin, 0, 14))) {
				$bin = substr($bin, 14);
			}

			while (false !== $pos = strpos(substr($bin, 0, 5), static::MARKER)) {
				$bin = substr($bin, $pos);

				extract(unpack('nirbid/Z*name', $bin, 4));

				// Calculate offset of lenght
				$offset = 6 + (strlen($name) ?: 2);
				$offset += $offset % 2;

				extract(unpack('Nlenght', $bin, $offset));
				$offset += 4;

				$iptc = substr($bin, $offset, $lenght);

				$bin = substr($bin, $offset + $lenght);

				if ($irbid != static::IRID) {
					continue;
				}

				$tags = array_merge($tags, static::decodeTags($iptc));
			}

			return new static(...$tags);
		}

		public function __toString () {
			$data = parent::__toString();
			$bin = static::MARKER;
			$bin .= pack('n2N', static::IRID, 0, strlen($data));
			$bin .= $data;

			return $bin;
		}
	}
