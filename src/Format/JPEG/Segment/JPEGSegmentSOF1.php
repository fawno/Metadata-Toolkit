<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentSOF1 extends JPEGSegmentSOF {
		public const NAME = 'SOF1';
		public const DESCRIPTION = 'Start Of Frame (SOF) Huffman - Extended sequential DCT';
		public const MARKER = JPEGSegments::SOF1;
	}
