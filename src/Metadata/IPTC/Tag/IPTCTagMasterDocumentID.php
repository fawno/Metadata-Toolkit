<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagMasterDocumentID extends IPTCTag {
		public const TAG = '2#185';
		public const NAME = 'MasterDocumentID';
		public const FORMAT = 'a*'; // string
	}
