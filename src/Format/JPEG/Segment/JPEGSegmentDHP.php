<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentDHP extends JPEGSegment {
		public const NAME = 'DHP';
		public const DESCRIPTION = 'Define Hierarchical progression (DHP)';
		public const MARKER = JPEGSegments::DHP;
	}
