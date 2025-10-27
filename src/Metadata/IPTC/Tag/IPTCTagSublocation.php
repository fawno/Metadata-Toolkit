<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagSublocation extends IPTCTag {
		public const TAG = '2#092';
		public const NAME = 'Sub-location';
		public const FORMAT = 'a*'; // string
	}
