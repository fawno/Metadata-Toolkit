<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG2 extends JPEGSegmentJPG {
		public const NAME = 'JPG2';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG2)';
		public const MARKER = JPEGSegments::JPG2;
	}
