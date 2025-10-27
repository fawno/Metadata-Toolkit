<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOI extends JPEGSegment {
		public const NAME = 'SOI';
		public const DESCRIPTION = 'Start of Image (SOI)';
		public const MARKER = JPEGSegments::SOI;
	}
