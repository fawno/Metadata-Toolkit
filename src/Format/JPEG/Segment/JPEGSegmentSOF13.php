<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF13 extends JPEGSegmentSOF {
		public const NAME = 'SOF13';
		public const DESCRIPTION = 'Start Of Frame Arithmetic - Differential sequential DCT (SOF13)';
		public const MARKER = JPEGSegments::SOF13;
	}
