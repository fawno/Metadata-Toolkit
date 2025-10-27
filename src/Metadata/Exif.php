<?php
  declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata;

	use Exception;
	use Fawno\MetadataToolkit\Metadata\Exif\Tag\ExifTag;

	class Exif {
		public const MARKER = "Exif\x00\x00";
		protected const INTEL_LSB = self::MARKER . 'II';
		protected const MOTOROLA_MSB = self::MARKER . 'MM';

		protected array $tags = [];

		protected function __construct (ExifTag ...$tags) {
			$this->tags = $tags;
		}

		public static function create (ExifTag ...$tags) : Exif {
			return new static(...$tags);
		}

		public static function decode (string $bin) : Exif {
			if (!preg_match('~^' . static::MOTOROLA_MSB . '|' . static::INTEL_LSB . '~', $bin)) {
				echo '<pre>', $bin, PHP_EOL, bin2hex($bin), '</pre>';
				throw new Exception('Invalid Exif byte alignment');
			}

			$msb = (0 === strpos($bin, static::MOTOROLA_MSB));

			$bin = substr($bin, 6);

			$id = current(unpack($msb ? 'n' : 'v', $bin, 2));

			if ($id != 42) {
				throw new Exception('Invalid Exif file');
			}

			$offset = current(unpack($msb ? 'N' : 'V', $bin, 4));
			$count = current(unpack($msb ? 'n' : 'v', $bin, $offset));
			$offset += 2;

			$tags = [];

			if ($msb) {
				while ($count--) {
					$tag = unpack('ntag/ntype/Nlength/Noffset', $bin, $offset);
					$value = current(unpack('a*', substr($bin, $tag['offset'], $tag['length'])));

					$tags[] = ExifTag::create($value, $tag['tag'], $tag['type'], 'a*');
					$offset += 12;
				}
			} else {
				while ($count--) {
					$tag = unpack('vtag/vtype/Vlength/Voffset', $bin, $offset);
					$value = current(unpack('a*', substr($bin, $tag['offset'], $tag['length'])));
					$tags[] = ExifTag::create($value, $tag['tag'], $tag['type'], 'a*');
					$offset += 12;
				}
			}

			return new static(...$tags);
		}
	}
