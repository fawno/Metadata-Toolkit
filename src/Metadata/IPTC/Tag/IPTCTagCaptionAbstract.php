<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagCaptionAbstract extends IPTCTag {
		public const TAG = '2#120';
		public const NAME = 'Caption-Abstract';
		public const FORMAT = 'a*'; // string
	}
