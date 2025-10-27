<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagContact extends IPTCTag {
		public const TAG = '2#118';
		public const NAME = 'Contact';
		public const FORMAT = 'a*'; // string
	}
