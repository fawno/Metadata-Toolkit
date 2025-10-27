<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagTimeCreated extends IPTCTag {
		public const TAG = '2#060';
		public const NAME = 'TimeCreated';
		public const FORMAT = 'a*'; // string
	}
