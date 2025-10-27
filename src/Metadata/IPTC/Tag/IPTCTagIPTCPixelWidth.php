<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagIPTCPixelWidth extends IPTCTag {
		public const TAG = '3#040';
		public const NAME = 'IPTCPixelWidth';
		public const FORMAT = 'n'; // int16u big endian
	}
