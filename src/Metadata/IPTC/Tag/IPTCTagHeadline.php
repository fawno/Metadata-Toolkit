<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagHeadline extends IPTCTag {
		public const TAG = '2#105';
		public const NAME = 'Headline';
		public const FORMAT = 'a*'; // string
	}
