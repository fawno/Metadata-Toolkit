<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagSubFile extends IPTCTag {
		public const TAG = '8#010';
		public const NAME = 'SubFile';
		public const FORMAT = 'a*'; // string
	}
