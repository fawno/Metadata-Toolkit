<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagInterchangeColorSpace extends IPTCTag {
		public const TAG = '3#064';
		public const NAME = 'InterchangeColorSpace';
		public const FORMAT = 'C'; // int8u
	}
