<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagLocalCaption extends IPTCTag {
		public const TAG = '2#121';
		public const NAME = 'LocalCaption';
		public const FORMAT = 'a*'; // string
	}
