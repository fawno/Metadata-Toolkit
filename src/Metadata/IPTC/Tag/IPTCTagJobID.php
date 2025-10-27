<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagJobID extends IPTCTag {
		public const TAG = '2#184';
		public const NAME = 'JobID';
		public const FORMAT = 'a*'; // string
	}
