<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagLookupTable extends IPTCTag {
		public const TAG = '3#080';
		public const NAME = 'LookupTable';
		public const FORMAT = 'a*'; // string
	}
