<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagICC_Profile extends IPTCTag {
		public const TAG = '3#066';
		public const NAME = 'ICC_Profile';
		public const FORMAT = 'a*'; // string
	}
