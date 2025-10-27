<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentRST2 extends JPEGSegmentRST {
		public const NAME = 'RST2';
		public const DESCRIPTION = 'Restart with modulo 8 count 2 (RST2)';
		public const MARKER = JPEGSegments::RST2;
	}
