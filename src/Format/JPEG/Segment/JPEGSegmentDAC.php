<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentDAC extends JPEGSegment {
		public const NAME = 'DAC';
		public const DESCRIPTION = 'Define Arithmetic coding conditioning(s) (DAC)';
		public const MARKER = JPEGSegments::DAC;
	}
