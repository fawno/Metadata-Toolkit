<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagReferenceService extends IPTCTag {
		public const TAG = '2#045';
		public const NAME = 'ReferenceService';
		public const FORMAT = 'a*'; // string
	}
