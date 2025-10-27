<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagMaximumDensityRange extends IPTCTag {
		public const TAG = '3#140';
		public const NAME = 'MaximumDensityRange';
		public const FORMAT = 'n'; // int16u big endian
	}
