<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF3 extends JPEGSegmentSOF {
		public const NAME = 'SOF4';
		public const DESCRIPTION = 'Start Of Frame Huffman - Spatial (sequential) lossless (SOF4)';
		public const MARKER = JPEGSegments::SOF3;
	}
