<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Metadata\Exif;
	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;
	use Fawno\MetadataToolkit\Metadata\XMP;

	class JPEGSegmentAPP1 extends JPEGSegmentAPP {
		public const NAME = 'APP1';
		public const DESCRIPTION = 'Application Field 1 (APP1) - usually Exif or XMP/RDF';
		public const MARKER = JPEGSegments::APP1;

		public static function decode (string $bin) : static {
			$xmpClass = (static::class == JPEGSegmentAPP1XMP::class);
			$exifClass = (static::class == JPEGSegmentAPP1Exif::class);

			if (4 === strpos($bin, XMP::MAGIC)) {
				return $xmpClass ? new static($bin) : JPEGSegmentAPP1XMP::decode($bin);
			}

			if (4 === strpos($bin, Exif::MARKER)) {
				return $exifClass ? new static($bin) : JPEGSegmentAPP1Exif::decode($bin);
			}

			if ($xmpClass or $exifClass) {
				return JPEGSegmentAPP1::decode($bin);
			}

			return new static($bin);
		}
	}
