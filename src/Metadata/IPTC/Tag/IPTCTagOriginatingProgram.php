<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagOriginatingProgram extends IPTCTag {
		public const TAG = '2#065';
		public const NAME = 'OriginatingProgram';
		public const FORMAT = 'a*'; // string
	}
