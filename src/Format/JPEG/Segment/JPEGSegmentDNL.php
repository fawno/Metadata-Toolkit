<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentDNL extends JPEGSegment {
		public const NAME = 'DNL';
		public const DESCRIPTION = 'Define Number of Lines (DNL)';
		public const MARKER = JPEGSegments::DNL;
	}
