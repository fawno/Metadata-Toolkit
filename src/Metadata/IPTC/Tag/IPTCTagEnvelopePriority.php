<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagEnvelopePriority extends IPTCTag {
		public const TAG = '1#060';
		public const NAME = 'EnvelopePriority';
		public const FORMAT = 'a*'; // string
	}
