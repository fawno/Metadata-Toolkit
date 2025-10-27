<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF11 extends JPEGSegmentSOF {
		public const NAME = 'SOF11';
		public const DESCRIPTION = 'Start Of Frame Arithmetic - Spatial (sequential) lossless (SOF11)';
		public const MARKER = JPEGSegments::SOF11;
	}
