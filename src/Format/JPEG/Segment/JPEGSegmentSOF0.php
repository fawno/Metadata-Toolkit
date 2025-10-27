<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF0 extends JPEGSegmentSOF {
		public const NAME = 'SOF0';
		public const DESCRIPTION = 'Start Of Frame (SOF) Huffman - Baseline DCT';
		public const MARKER = JPEGSegments::SOF0;
	}
