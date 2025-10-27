<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG5 extends JPEGSegmentJPG {
		public const NAME = 'JPG5';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG5)';
		public const MARKER = JPEGSegments::JPG5;
	}
