<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP11 extends JPEGSegmentAPP {
		public const NAME = 'APP11';
		public const DESCRIPTION = 'Application Field 11 (APP11)';
		public const MARKER = JPEGSegments::APP11;
	}
