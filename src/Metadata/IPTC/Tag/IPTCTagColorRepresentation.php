<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagColorRepresentation extends IPTCTag {
		public const TAG = '3#060';
		public const NAME = 'ColorRepresentation';
		public const FORMAT = 'n'; // int16u big endian
	}
