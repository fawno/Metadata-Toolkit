<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagCountryPrimaryLocationCode extends IPTCTag {
		public const TAG = '2#100';
		public const NAME = 'Country-PrimaryLocationCode';
		public const FORMAT = 'a*'; // string
	}
