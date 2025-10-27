<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG11 extends JPEGSegmentJPG {
		public const NAME = 'JPG11';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG11)';
		public const MARKER = JPEGSegments::JPG11;
	}
