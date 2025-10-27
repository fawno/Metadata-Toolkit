<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagDigitalCreationDate extends IPTCTag {
		public const TAG = '2#062';
		public const NAME = 'DigitalCreationDate';
		public const FORMAT = 'a*'; // string
	}
