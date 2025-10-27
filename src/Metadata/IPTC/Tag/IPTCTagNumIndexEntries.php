<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagNumIndexEntries extends IPTCTag {
		public const TAG = '3#084';
		public const NAME = 'NumIndexEntries';
		public const FORMAT = 'n'; // int16u big endian
	}
