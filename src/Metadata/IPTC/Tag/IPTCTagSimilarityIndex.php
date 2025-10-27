<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagSimilarityIndex extends IPTCTag {
		public const TAG = '2#228';
		public const NAME = 'SimilarityIndex';
		public const FORMAT = 'a*'; // string
	}
