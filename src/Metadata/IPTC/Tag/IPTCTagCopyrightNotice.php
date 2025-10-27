<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagCopyrightNotice extends IPTCTag {
		public const TAG = '2#116';
		public const NAME = 'CopyrightNotice';
		public const FORMAT = 'a*'; // string
	}
