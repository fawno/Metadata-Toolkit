<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentDHT extends JPEGSegment {
		public const NAME = 'DHT';
		public const DESCRIPTION = 'Define Huffman Table(s) (DHT)';
		public const MARKER = JPEGSegments::DHT;
	}
