<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP5 extends JPEGSegmentAPP {
		public const NAME = 'APP5';
		public const DESCRIPTION = 'Application Field 5 (APP5)';
		public const MARKER = JPEGSegments::APP5;
	}
