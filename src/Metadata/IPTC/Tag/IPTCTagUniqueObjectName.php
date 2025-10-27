<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagUniqueObjectName extends IPTCTag {
		public const TAG = '1#100';
		public const NAME = 'UniqueObjectName';
		public const FORMAT = 'a*'; // string
	}
