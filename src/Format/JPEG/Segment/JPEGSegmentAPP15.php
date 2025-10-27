<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP15 extends JPEGSegmentAPP {
		public const NAME = 'APP15';
		public const DESCRIPTION = 'Application Field 15 (APP15)';
		public const MARKER = JPEGSegments::APP15;
	}
