<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagObjectTypeReference extends IPTCTag {
		public const TAG = '2#003';
		public const NAME = 'ObjectTypeReference';
		public const FORMAT = 'a*'; // string
	}
