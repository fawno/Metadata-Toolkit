<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagBitsPerComponent extends IPTCTag {
		public const TAG = '3#135';
		public const NAME = 'BitsPerComponent';
		public const FORMAT = 'C'; // int8u
	}
