<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagAudioType extends IPTCTag {
		public const TAG = '2#150';
		public const NAME = 'AudioType';
		public const FORMAT = 'a*'; // string
	}
