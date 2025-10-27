<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagImageType extends IPTCTag {
		public const TAG = '2#130';
		public const NAME = 'ImageType';
		public const FORMAT = 'a*'; // string
	}
