<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagReferenceNumber extends IPTCTag {
		public const TAG = '2#050';
		public const NAME = 'ReferenceNumber';
		public const FORMAT = 'a*'; // string
	}
