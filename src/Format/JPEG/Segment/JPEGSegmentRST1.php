<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentRST1 extends JPEGSegmentRST {
		public const NAME = 'RST1';
		public const DESCRIPTION = 'Restart with modulo 8 count 1 (RST1)';
		public const MARKER = JPEGSegments::RST1;
	}
