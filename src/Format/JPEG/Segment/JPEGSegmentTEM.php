<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentTEM extends JPEGSegment {
		public const NAME = 'TEM';
		public const DESCRIPTION = 'For temp private use arith code (TEM)';
		public const MARKER = JPEGSegments::TEM;
	}
