<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagMaxSubfileSize extends IPTCTag {
		public const TAG = '7#020';
		public const NAME = 'MaxSubfileSize';
		public const FORMAT = 'N'; // int32u big endiand
	}
