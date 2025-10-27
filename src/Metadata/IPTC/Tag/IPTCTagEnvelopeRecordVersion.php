<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagEnvelopeRecordVersion extends IPTCTag {
		public const TAG = '1#000';
		public const NAME = 'EnvelopeRecordVersion';
		public const FORMAT = 'n'; // int16u big endian
	}
