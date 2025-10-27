<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagReleaseTime extends IPTCTag {
		public const TAG = '2#035';
		public const NAME = 'ReleaseTime';
		public const FORMAT = 'a*'; // string
	}
