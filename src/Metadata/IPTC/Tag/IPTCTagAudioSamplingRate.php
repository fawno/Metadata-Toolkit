<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagAudioSamplingRate extends IPTCTag {
		public const TAG = '2#151';
		public const NAME = 'AudioSamplingRate';
		public const FORMAT = 'a*'; // string
	}
