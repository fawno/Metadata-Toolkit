<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagGammaCompensatedValue extends IPTCTag {
		public const TAG = '3#145';
		public const NAME = 'GammaCompensatedValue';
		public const FORMAT = 'n'; // int16u big endian
	}
