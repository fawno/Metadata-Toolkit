<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagProvinceState extends IPTCTag {
		public const TAG = '2#095';
		public const NAME = 'Province-State';
		public const FORMAT = 'a*'; // string
	}
