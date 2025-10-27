<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagFixtureIdentifier extends IPTCTag {
		public const TAG = '2#022';
		public const NAME = 'FixtureIdentifier';
		public const FORMAT = 'a*'; // string
	}
