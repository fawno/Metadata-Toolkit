<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagApplicationRecordVersion extends IPTCTag {
		public const TAG = '2#000';
		public const NAME = 'ApplicationRecordVersion';
		public const FORMAT = 'n'; // int16u big endian
	}
