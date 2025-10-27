<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagBylineTitle extends IPTCTag {
		public const TAG = '2#085';
		public const NAME = 'By-lineTitle';
		public const FORMAT = 'a*'; // string
	}
