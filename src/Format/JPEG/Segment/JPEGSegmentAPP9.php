<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP9 extends JPEGSegmentAPP {
		public const NAME = 'APP9';
		public const DESCRIPTION = 'Application Field 9 (APP9)';
		public const MARKER = JPEGSegments::APP9;
	}
