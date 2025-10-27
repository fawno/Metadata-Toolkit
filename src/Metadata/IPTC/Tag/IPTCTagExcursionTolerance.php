<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagExcursionTolerance extends IPTCTag {
		public const TAG = '3#130';
		public const NAME = 'ExcursionTolerance';
		public const FORMAT = 'C'; // int8u
	}
