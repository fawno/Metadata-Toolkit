<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagTimeSent extends IPTCTag {
		public const TAG = '1#080';
		public const NAME = 'TimeSent';
		public const FORMAT = 'a*'; // string
	}
