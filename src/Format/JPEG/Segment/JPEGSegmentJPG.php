<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG extends JPEGSegment {
		public const NAME = 'JPG';
		public const DESCRIPTION = 'Start Of Frame Arithmetic - Reserved for JPEG extensions (JPG)';
		public const MARKER = JPEGSegments::JPG;
	}
