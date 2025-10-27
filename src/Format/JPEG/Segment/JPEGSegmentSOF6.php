<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF6 extends JPEGSegmentSOF {
		public const NAME = 'SOF6';
		public const DESCRIPTION = 'Start Of Frame Huffman - Differential progressive DCT (SOF6)';
		public const MARKER = JPEGSegments::SOF6;
	}
