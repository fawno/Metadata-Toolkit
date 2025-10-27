<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagIPTCBitsPerSample extends IPTCTag {
		public const TAG = '3#086';
		public const NAME = 'IPTCBitsPerSample';
		public const FORMAT = 'C'; // int8u
	}
