<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG8 extends JPEGSegmentJPG {
		public const NAME = 'JPG8';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG8)';
		public const MARKER = JPEGSegments::JPG8;
	}
