<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagColorCalibrationMatrix extends IPTCTag {
		public const TAG = '3#070';
		public const NAME = 'ColorCalibrationMatrix';
		public const FORMAT = 'a*'; // string
	}
