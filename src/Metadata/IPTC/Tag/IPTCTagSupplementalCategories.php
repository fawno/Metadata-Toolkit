<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagSupplementalCategories extends IPTCTag {
		public const TAG = '2#020';
		public const NAME = 'SupplementalCategories';
		public const FORMAT = 'a*'; // string
	}
