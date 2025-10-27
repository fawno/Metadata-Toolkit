<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagEditStatus extends IPTCTag {
		public const TAG = '2#007';
		public const NAME = 'EditStatus';
		public const FORMAT = 'a*'; // string
	}
