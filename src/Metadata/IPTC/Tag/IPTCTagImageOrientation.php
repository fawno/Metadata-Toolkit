<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagImageOrientation extends IPTCTag {
		public const TAG = '2#131';
		public const NAME = 'ImageOrientation';
		public const FORMAT = 'a*'; // string
	}
