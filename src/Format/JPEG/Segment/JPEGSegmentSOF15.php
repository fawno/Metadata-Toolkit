<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF15 extends JPEGSegmentSOF {
		public const NAME = 'SOF15';
		public const DESCRIPTION = 'Start Of Frame Arithmetic - Differential spatial (SOF15)';
		public const MARKER = JPEGSegments::SOF15;
	}
