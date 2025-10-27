<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagDigitalCreationTime extends IPTCTag {
		public const TAG = '2#063';
		public const NAME = 'DigitalCreationTime';
		public const FORMAT = 'a*'; // string
	}
