<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagObjectAttributeReference extends IPTCTag {
		public const TAG = '2#004';
		public const NAME = 'ObjectAttributeReference';
		public const FORMAT = 'a*'; // string
	}
