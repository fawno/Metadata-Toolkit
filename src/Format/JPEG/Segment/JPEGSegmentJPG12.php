<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG12 extends JPEGSegmentJPG {
		public const NAME = 'JPG12';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG12)';
		public const MARKER = JPEGSegments::JPG12;
	}
