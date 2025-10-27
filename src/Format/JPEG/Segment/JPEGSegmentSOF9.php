<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF9 extends JPEGSegmentSOF {
		public const NAME = 'SOF9';
		public const DESCRIPTION = 'Start Of Frame Arithmetic - Extended sequential DCT (SOF9)';
		public const MARKER = JPEGSegments::SOF9;
	}
