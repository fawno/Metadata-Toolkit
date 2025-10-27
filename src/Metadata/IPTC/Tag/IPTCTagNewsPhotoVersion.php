<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagNewsPhotoVersion extends IPTCTag {
		public const TAG = '3#000';
		public const NAME = 'NewsPhotoVersion';
		public const FORMAT = 'n'; // int16u big endian
	}
