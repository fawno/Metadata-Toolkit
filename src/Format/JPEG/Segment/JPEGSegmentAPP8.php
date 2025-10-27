<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP8 extends JPEGSegmentAPP {
		public const NAME = 'APP8';
		public const DESCRIPTION = 'Application Field 8 (APP8)';
		public const MARKER = JPEGSegments::APP8;
	}
