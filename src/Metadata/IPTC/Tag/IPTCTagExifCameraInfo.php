<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagExifCameraInfo extends IPTCTag {
		public const TAG = '2#232';
		public const NAME = 'ExifCameraInfo';
		public const FORMAT = 'a*'; // string
	}
