<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagReleaseDate extends IPTCTag {
		public const TAG = '2#030';
		public const NAME = 'ReleaseDate';
		public const FORMAT = 'a*'; // string
	}
