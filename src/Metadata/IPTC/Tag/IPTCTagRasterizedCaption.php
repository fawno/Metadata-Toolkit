<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagRasterizedCaption extends IPTCTag {
		public const TAG = '2#125';
		public const NAME = 'RasterizedCaption';
		public const FORMAT = 'a*'; // string
	}
