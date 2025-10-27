<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagMaximumObjectSize extends IPTCTag {
		public const TAG = '7#095';
		public const NAME = 'MaximumObjectSize';
		public const FORMAT = 'N'; // int32u big endiand
	}
