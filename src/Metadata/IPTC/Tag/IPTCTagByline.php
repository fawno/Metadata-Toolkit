<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagByline extends IPTCTag {
		public const TAG = '2#080';
		public const NAME = 'By-line';
		public const FORMAT = 'a*'; // string
	}
