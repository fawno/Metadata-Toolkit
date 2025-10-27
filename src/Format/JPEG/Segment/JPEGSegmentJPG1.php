<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG1 extends JPEGSegmentJPG {
		public const NAME = 'JPG1';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG1)';
		public const MARKER = JPEGSegments::JPG1;
	}
