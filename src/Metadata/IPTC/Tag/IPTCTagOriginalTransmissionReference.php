<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagOriginalTransmissionReference extends IPTCTag {
		public const TAG = '2#103';
		public const NAME = 'OriginalTransmissionReference';
		public const FORMAT = 'a*'; // string
	}
