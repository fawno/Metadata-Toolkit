<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagLanguageIdentifier extends IPTCTag {
		public const TAG = '2#135';
		public const NAME = 'LanguageIdentifier';
		public const FORMAT = 'a*'; // string
	}
