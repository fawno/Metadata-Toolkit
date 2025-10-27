<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagCategory extends IPTCTag {
		public const TAG = '2#015';
		public const NAME = 'Category';
		public const FORMAT = 'a*'; // string
	}
