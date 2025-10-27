<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagIPTCImageWidth extends IPTCTag {
		public const TAG = '3#020';
		public const NAME = 'IPTCImageWidth';
		public const FORMAT = 'n'; // int16u big endian
	}
