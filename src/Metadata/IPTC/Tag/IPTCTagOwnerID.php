<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagOwnerID extends IPTCTag {
		public const TAG = '2#188';
		public const NAME = 'OwnerID';
		public const FORMAT = 'a*'; // string
	}
