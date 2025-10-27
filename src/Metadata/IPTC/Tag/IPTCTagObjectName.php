<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagObjectName extends IPTCTag {
		public const TAG = '2#005';
		public const NAME = 'ObjectName';
		public const FORMAT = 'a*'; // string
	}
