<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagCountryPrimaryLocationName extends IPTCTag {
		public const TAG = '2#101';
		public const NAME = 'Country-PrimaryLocationName';
		public const FORMAT = 'a*'; // string
	}
