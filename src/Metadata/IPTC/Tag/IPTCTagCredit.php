<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagCredit extends IPTCTag {
		public const TAG = '2#110';
		public const NAME = 'Credit';
		public const FORMAT = 'a*'; // string
	}
