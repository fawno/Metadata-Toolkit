<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagFileVersion extends IPTCTag {
		public const TAG = '1#022';
		public const NAME = 'FileVersion';
		public const FORMAT = 'n'; // int16u big endian
	}
