<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG4 extends JPEGSegmentJPG {
		public const NAME = 'JPG4';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG4)';
		public const MARKER = JPEGSegments::JPG4;
	}
