<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagObjectPreviewFileVersion extends IPTCTag {
		public const TAG = '2#201';
		public const NAME = 'ObjectPreviewFileVersion';
		public const FORMAT = 'n'; // int16u big endian
	}
