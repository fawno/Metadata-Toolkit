<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF7 extends JPEGSegmentSOF {
		public const NAME = 'SOF7';
		public const DESCRIPTION = 'Start Of Frame Huffman - Differential spatial (SOF7)';
		public const MARKER = JPEGSegments::SOF7;
	}
