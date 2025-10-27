<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagColorPalette extends IPTCTag {
		public const TAG = '3#085';
		public const NAME = 'ColorPalette';
		public const FORMAT = 'a*'; // string
	}
