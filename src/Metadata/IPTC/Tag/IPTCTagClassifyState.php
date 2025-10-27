<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagClassifyState extends IPTCTag {
		public const TAG = '2#225';
		public const NAME = 'ClassifyState';
		public const FORMAT = 'a*'; // string
	}
