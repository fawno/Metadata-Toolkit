<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagIPTCImageRotation extends IPTCTag {
		public const TAG = '3#102';
		public const NAME = 'IPTCImageRotation';
		public const FORMAT = 'C'; // int8u
	}
