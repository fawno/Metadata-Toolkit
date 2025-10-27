<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG3 extends JPEGSegmentJPG {
		public const NAME = 'JPG3';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG3)';
		public const MARKER = JPEGSegments::JPG3;
	}
