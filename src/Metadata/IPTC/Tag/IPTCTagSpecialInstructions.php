<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagSpecialInstructions extends IPTCTag {
		public const TAG = '2#040';
		public const NAME = 'SpecialInstructions';
		public const FORMAT = 'a*'; // string
	}
