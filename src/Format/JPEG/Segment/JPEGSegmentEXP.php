<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentEXP extends JPEGSegment {
		public const NAME = 'EXP';
		public const DESCRIPTION = 'Expand Reference Component(s) (EXP)';
		public const MARKER = JPEGSegments::EXP;
	}
