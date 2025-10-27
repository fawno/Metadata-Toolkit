<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagExpirationDate extends IPTCTag {
		public const TAG = '2#037';
		public const NAME = 'ExpirationDate';
		public const FORMAT = 'a*'; // string
	}
