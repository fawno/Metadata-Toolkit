<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	use Fawno\MetadataToolkit\Metadata\SCCU;

	class IPTCTagCustomDataSCCU extends IPTCTagCustomData {
		public const NAME = 'CustomData-SCCU';

		public static function decode (string $bin) : ?static {
			$length = current(unpack('nlength', $bin, 2));

			if ($sccu = SCCU::decode(substr($bin, 4, $length))) {
				return static::create($sccu);
			}

			return null;
		}
	}
