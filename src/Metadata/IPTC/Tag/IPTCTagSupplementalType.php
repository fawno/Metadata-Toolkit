<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagSupplementalType extends IPTCTag {
		public const TAG = '3#055';
		public const NAME = 'SupplementalType';
		public const FORMAT = 'C'; // int8u
	}
