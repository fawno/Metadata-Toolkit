<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagServiceIdentifier extends IPTCTag {
		public const TAG = '1#030';
		public const NAME = 'ServiceIdentifier';
		public const FORMAT = 'a*'; // string
	}
