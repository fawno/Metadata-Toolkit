<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP12 extends JPEGSegmentAPP {
		public const NAME = 'APP12';
		public const DESCRIPTION = 'Application Field 12 (APP12) - usually [picture info]';
		public const MARKER = JPEGSegments::APP12;
	}
