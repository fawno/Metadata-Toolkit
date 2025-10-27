<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP3 extends JPEGSegmentAPP {
		public const NAME = 'APP3';
		public const DESCRIPTION = 'Application Field 3 (APP3)';
		public const MARKER = JPEGSegments::APP3;
	}
