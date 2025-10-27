<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagARMVersion extends IPTCTag {
		public const TAG = '1#122';
		public const NAME = 'ARMVersion';
		public const FORMAT = 'n'; // int16u big endian
	}
