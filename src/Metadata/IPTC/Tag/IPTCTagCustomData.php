<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagCustomData extends IPTCTag {
		public const TAG = '2#243';
		public const NAME = 'CustomData';
		public const FORMAT = 'a*'; // string

		public static function decode (string $bin) : ?static {
			if ($sccu = IPTCTagCustomDataSCCU::decode($bin)) {
				return $sccu;
			}

			return parent::decode($bin);
		}
	}
