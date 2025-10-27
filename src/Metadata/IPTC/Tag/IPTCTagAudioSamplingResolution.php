<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagAudioSamplingResolution extends IPTCTag {
		public const TAG = '2#152';
		public const NAME = 'AudioSamplingResolution';
		public const FORMAT = 'a*'; // string
	}
