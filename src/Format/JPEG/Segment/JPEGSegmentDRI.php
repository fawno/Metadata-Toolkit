<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentDRI extends JPEGSegment {
		public const NAME = 'DRI';
		public const DESCRIPTION = 'Define Restart Interval (DRI)';
		public const MARKER = JPEGSegments::DRI;
	}
