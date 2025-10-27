<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF5 extends JPEGSegmentSOF {
		public const NAME = 'SOF5';
		public const DESCRIPTION = 'Start Of Frame Huffman - Differential sequential DCT (SOF5)';
		public const MARKER = JPEGSegments::SOF5;
	}
