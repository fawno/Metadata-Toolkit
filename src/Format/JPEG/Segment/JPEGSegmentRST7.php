<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentRST7 extends JPEGSegmentRST {
		public const NAME = 'RST7';
		public const DESCRIPTION = 'Restart with modulo 8 count 7 (RST7)';
		public const MARKER = JPEGSegments::RST7;
	}
