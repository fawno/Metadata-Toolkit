<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF2 extends JPEGSegmentSOF {
		public const NAME = 'SOF2';
		public const DESCRIPTION = 'Start Of Frame Huffman - Progressive DCT (SOF2)';
		public const MARKER = JPEGSegments::SOF2;
	}
