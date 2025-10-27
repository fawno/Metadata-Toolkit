<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP4 extends JPEGSegmentAPP {
		public const NAME = 'APP4';
		public const DESCRIPTION = 'Application Field 4 (APP4)';
		public const MARKER = JPEGSegments::APP4;
	}
