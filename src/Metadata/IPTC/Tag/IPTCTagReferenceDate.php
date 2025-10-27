<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagReferenceDate extends IPTCTag {
		public const TAG = '2#047';
		public const NAME = 'ReferenceDate';
		public const FORMAT = 'a*'; // string
	}
