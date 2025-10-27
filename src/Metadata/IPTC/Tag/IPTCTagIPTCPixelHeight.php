<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagIPTCPixelHeight extends IPTCTag {
		public const TAG = '3#050';
		public const NAME = 'IPTCPixelHeight';
		public const FORMAT = 'n'; // int16u big endian
	}
