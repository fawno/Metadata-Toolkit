<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG6 extends JPEGSegmentJPG {
		public const NAME = 'JPG6';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG6)';
		public const MARKER = JPEGSegments::JPG6;
	}
