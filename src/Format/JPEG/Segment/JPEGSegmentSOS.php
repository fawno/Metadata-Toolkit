<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOS extends JPEGSegment {
		public const NAME = 'SOS';
		public const DESCRIPTION = 'Start of Scan (SOS)';
		public const MARKER = JPEGSegments::SOS;
	}
