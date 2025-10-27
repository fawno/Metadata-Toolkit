<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagFileFormat extends IPTCTag {
		public const TAG = '1#020';
		public const NAME = 'FileFormat';
		public const FORMAT = 'n'; // int16u big endian
	}
