<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagConfirmedObjectSize extends IPTCTag {
		public const TAG = '9#010';
		public const NAME = 'ConfirmedObjectSize';
		public const FORMAT = 'N'; // int32u big endiand
	}
