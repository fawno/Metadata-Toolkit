<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP14 extends JPEGSegmentAPP {
		public const NAME = 'APP14';
		public const DESCRIPTION = 'Application Field 14 (APP14)';
		public const MARKER = JPEGSegments::APP14;
	}
