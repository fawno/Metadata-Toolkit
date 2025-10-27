<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagColorSequence extends IPTCTag {
		public const TAG = '3#065';
		public const NAME = 'ColorSequence';
		public const FORMAT = 'C'; // int8u
	}
