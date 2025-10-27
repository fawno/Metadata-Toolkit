<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentRST4 extends JPEGSegmentRST {
		public const NAME = 'RST4';
		public const DESCRIPTION = 'Restart with modulo 8 count 4 (RST4)';
		public const MARKER = JPEGSegments::RST4;
	}
