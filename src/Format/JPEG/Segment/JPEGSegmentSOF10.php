<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF10 extends JPEGSegmentSOF {
		public const NAME = 'SOF10';
		public const DESCRIPTION = 'Start Of Frame Arithmetic - Progressive DCT (SOF10)';
		public const MARKER = JPEGSegments::SOF10;
	}
