<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagSource extends IPTCTag {
		public const TAG = '2#115';
		public const NAME = 'Source';
		public const FORMAT = 'a*'; // string
	}
