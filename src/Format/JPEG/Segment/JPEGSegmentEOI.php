<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentEOI extends JPEGSegment {
		public const NAME = 'EOI';
		public const DESCRIPTION = 'End of Image (EOI)';
		public const MARKER = JPEGSegments::EOI;
	}
