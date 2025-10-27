<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagEndPoints extends IPTCTag {
		public const TAG = '3#125';
		public const NAME = 'EndPoints';
		public const FORMAT = 'a*'; // string
	}
