<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagShortDocumentID extends IPTCTag {
		public const TAG = '2#186';
		public const NAME = 'ShortDocumentID';
		public const FORMAT = 'a*'; // string
	}
