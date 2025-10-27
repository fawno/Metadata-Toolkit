<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG9 extends JPEGSegmentJPG {
		public const NAME = 'JPG9';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG9)';
		public const MARKER = JPEGSegments::JPG9;
	}
