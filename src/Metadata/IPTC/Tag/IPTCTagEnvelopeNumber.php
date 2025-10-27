<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagEnvelopeNumber extends IPTCTag {
		public const TAG = '1#040';
		public const NAME = 'EnvelopeNumber';
		public const FORMAT = 'a*'; // string
	}
