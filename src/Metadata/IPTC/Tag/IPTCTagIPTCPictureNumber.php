<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagIPTCPictureNumber extends IPTCTag {
		public const TAG = '3#010';
		public const NAME = 'IPTCPictureNumber';
		public const FORMAT = 'a*'; // string
	}
