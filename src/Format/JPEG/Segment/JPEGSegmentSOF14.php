<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF14 extends JPEGSegmentSOF {
		public const NAME = 'SOF14';
		public const DESCRIPTION = 'Start Of Frame Arithmetic - Differential progressive DCT (SOF14)';
		public const MARKER = JPEGSegments::SOF14;
	}
