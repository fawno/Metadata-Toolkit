<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagObjectSizeAnnounced extends IPTCTag {
		public const TAG = '7#090';
		public const NAME = 'ObjectSizeAnnounced';
		public const FORMAT = 'N'; // int32u big endiand
	}
