<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagDataCompressionMethod extends IPTCTag {
		public const TAG = '3#110';
		public const NAME = 'DataCompressionMethod';
		public const FORMAT = 'N'; // int32u big endiand
	}
