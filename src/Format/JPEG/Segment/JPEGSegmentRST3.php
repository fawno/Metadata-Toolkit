<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentRST3 extends JPEGSegmentRST {
		public const NAME = 'RST3';
		public const DESCRIPTION = 'Restart with modulo 8 count 3 (RST3)';
		public const MARKER = JPEGSegments::RST3;
	}
