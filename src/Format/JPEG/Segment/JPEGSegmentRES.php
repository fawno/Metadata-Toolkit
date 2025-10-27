<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentRES extends JPEGSegment {
		public const NAME = 'RES';
		public const DESCRIPTION = 'Reserved (RES)';
		public const MARKER = JPEGSegments::RES;
	}
