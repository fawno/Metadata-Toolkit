<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagContentLocationCode extends IPTCTag {
		public const TAG = '2#026';
		public const NAME = 'ContentLocationCode';
		public const FORMAT = 'a*'; // string
	}
