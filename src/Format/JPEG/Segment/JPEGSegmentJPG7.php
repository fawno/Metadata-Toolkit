<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG7 extends JPEGSegmentJPG {
		public const NAME = 'JPG7';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG7)';
		public const MARKER = JPEGSegments::JPG7;
	}
