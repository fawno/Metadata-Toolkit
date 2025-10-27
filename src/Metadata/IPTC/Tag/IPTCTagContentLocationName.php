<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagContentLocationName extends IPTCTag {
		public const TAG = '2#027';
		public const NAME = 'ContentLocationName';
		public const FORMAT = 'a*'; // string
	}
