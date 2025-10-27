<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagCity extends IPTCTag {
		public const TAG = '2#090';
		public const NAME = 'City';
		public const FORMAT = 'a*'; // string
	}
