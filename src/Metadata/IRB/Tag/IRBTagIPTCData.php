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

			while (static::MARKER == substr($bin, 0, 4)) {
				$app13 = unpack('a4bim/nid/n/Nlenght', $bin);

				$iptc = substr($bin, 12, $app13['lenght']);

				$bin = substr($bin, 12 + $app13['lenght']);

				if ($app13['id'] != static::IRID) {
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
