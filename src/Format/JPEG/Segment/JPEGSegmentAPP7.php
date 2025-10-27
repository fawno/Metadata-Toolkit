<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP7 extends JPEGSegmentAPP {
		public const NAME = 'APP7';
		public const DESCRIPTION = 'Application Field 7 (APP7)';
		public const MARKER = JPEGSegments::APP7;
	}
