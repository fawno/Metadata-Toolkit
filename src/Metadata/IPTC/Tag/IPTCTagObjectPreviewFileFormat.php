<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagObjectPreviewFileFormat extends IPTCTag {
		public const TAG = '2#200';
		public const NAME = 'ObjectPreviewFileFormat';
		public const FORMAT = 'n'; // int16u big endian
	}
