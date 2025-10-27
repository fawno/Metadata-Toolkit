<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagDocumentNotes extends IPTCTag {
		public const TAG = '2#230';
		public const NAME = 'DocumentNotes';
		public const FORMAT = 'a*'; // string
	}
