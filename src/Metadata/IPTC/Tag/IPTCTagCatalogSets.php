<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagCatalogSets extends IPTCTag {
		public const TAG = '2#255';
		public const NAME = 'CatalogSets';
		public const FORMAT = 'a*'; // string
	}
