<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentDQT extends JPEGSegment {
		public const NAME = 'DQT';
		public const DESCRIPTION = 'Define quantization Table(s) (DQT)';
		public const MARKER = JPEGSegments::DQT;
	}
