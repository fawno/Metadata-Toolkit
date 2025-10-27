<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagARMIdentifier extends IPTCTag {
		public const TAG = '1#120';
		public const NAME = 'ARMIdentifier';
		public const FORMAT = 'n'; // int16u big endian
	}
