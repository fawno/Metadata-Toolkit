<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagDestination extends IPTCTag {
		public const TAG = '1#005';
		public const NAME = 'Destination';
		public const FORMAT = 'a*'; // string
	}
