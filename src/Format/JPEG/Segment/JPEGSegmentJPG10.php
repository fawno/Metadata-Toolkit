<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG10 extends JPEGSegmentJPG {
		public const NAME = 'JPG10';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG10)';
		public const MARKER = JPEGSegments::JPG10;
	}
