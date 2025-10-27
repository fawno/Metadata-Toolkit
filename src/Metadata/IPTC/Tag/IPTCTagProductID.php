<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagProductID extends IPTCTag {
		public const TAG = '1#050';
		public const NAME = 'ProductID';
		public const FORMAT = 'a*'; // string
	}
