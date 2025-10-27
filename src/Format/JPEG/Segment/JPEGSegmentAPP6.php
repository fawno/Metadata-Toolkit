<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP6 extends JPEGSegmentAPP {
		public const NAME = 'APP6';
		public const DESCRIPTION = 'Application Field 6 (APP6)';
		public const MARKER = JPEGSegments::APP6;
	}
