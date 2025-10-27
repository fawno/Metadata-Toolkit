<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagDateSent extends IPTCTag {
		public const TAG = '1#070';
		public const NAME = 'DateSent';
		public const FORMAT = 'a*'; // string
	}
