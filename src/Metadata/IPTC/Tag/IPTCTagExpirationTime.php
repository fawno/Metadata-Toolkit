<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagExpirationTime extends IPTCTag {
		public const TAG = '2#038';
		public const NAME = 'ExpirationTime';
		public const FORMAT = 'a*'; // string
	}
