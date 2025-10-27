<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagUniqueDocumentID extends IPTCTag {
		public const TAG = '2#187';
		public const NAME = 'UniqueDocumentID';
		public const FORMAT = 'a*'; // string
	}
