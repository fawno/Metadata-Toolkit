<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IPTC\Tag;

	class IPTCTagSubjectReference extends IPTCTag {
		public const TAG = '2#012';
		public const NAME = 'SubjectReference';
		public const FORMAT = 'a*'; // string
	}
