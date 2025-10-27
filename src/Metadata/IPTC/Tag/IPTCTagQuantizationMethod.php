<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagQuantizationMethod extends IPTCTag {
		public const TAG = '3#120';
		public const NAME = 'QuantizationMethod';
		public const FORMAT = 'C'; // int8u
	}
