<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagScanningDirection extends IPTCTag {
		public const TAG = '3#100';
		public const NAME = 'ScanningDirection';
		public const FORMAT = 'C'; // int8u
	}
