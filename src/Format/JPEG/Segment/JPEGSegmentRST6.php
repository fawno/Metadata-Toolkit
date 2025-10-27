<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentRST6 extends JPEGSegmentRST {
		public const NAME = 'RST6';
		public const DESCRIPTION = 'Restart with modulo 8 count 6 (RST6)';
		public const MARKER = JPEGSegments::RST6;
	}
