<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagUrgency extends IPTCTag {
		public const TAG = '2#010';
		public const NAME = 'Urgency';
		public const FORMAT = 'a*'; // string
	}
