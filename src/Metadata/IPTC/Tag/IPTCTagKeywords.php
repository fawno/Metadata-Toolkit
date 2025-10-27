<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagKeywords extends IPTCTag {
		public const TAG = '2#025';
		public const NAME = 'Keywords';
		public const FORMAT = 'a*'; // string
	}
