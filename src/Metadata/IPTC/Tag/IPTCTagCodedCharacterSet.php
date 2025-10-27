<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagCodedCharacterSet extends IPTCTag {
		public const TAG = '1#090';
		public const NAME = 'CodedCharacterSet';
		public const FORMAT = 'a*'; // string
	}
