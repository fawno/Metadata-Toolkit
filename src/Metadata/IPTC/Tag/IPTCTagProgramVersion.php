<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagProgramVersion extends IPTCTag {
		public const TAG = '2#070';
		public const NAME = 'ProgramVersion';
		public const FORMAT = 'a*'; // string
	}
