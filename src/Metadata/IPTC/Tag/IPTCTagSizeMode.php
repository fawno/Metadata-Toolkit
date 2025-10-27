<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagSizeMode extends IPTCTag {
		public const TAG = '7#010';
		public const NAME = 'SizeMode';
		public const FORMAT = 'C'; // int8u
	}
