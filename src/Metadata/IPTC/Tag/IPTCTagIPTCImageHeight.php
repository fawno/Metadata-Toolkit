<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagIPTCImageHeight extends IPTCTag {
		public const TAG = '3#030';
		public const NAME = 'IPTCImageHeight';
		public const FORMAT = 'n'; // int16u big endian
	}
