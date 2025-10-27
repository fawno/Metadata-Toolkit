<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP2 extends JPEGSegmentAPP {
		public const NAME = 'APP2';
		public const DESCRIPTION = 'Application Field 2 (APP2) - usually Flashpix';
		public const MARKER = JPEGSegments::APP2;
	}
