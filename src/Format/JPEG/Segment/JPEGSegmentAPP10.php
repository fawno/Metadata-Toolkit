<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP10 extends JPEGSegmentAPP {
		public const NAME = 'APP10';
		public const DESCRIPTION = 'Application Field 10 (APP10)';
		public const MARKER = JPEGSegments::APP10;
	}
