<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagDateCreated extends IPTCTag {
		public const TAG = '2#055';
		public const NAME = 'DateCreated';
		public const FORMAT = 'a*'; // string
	}
