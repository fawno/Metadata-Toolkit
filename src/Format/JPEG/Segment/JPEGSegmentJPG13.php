<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentJPG13 extends JPEGSegmentJPG {
		public const NAME = 'JPG13';
		public const DESCRIPTION = 'Reserved for JPEG extensions (JPG13)';
		public const MARKER = JPEGSegments::JPG13;
	}
