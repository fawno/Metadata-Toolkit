<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagEditorialUpdate extends IPTCTag {
		public const TAG = '2#008';
		public const NAME = 'EditorialUpdate';
		public const FORMAT = 'a*'; // string
	}
