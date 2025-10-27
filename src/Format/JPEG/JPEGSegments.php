<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG;

	use Fawno\MetadataToolkit\Format\JPEG\Segment\JPEGSegment;

	class JPEGSegments {
		/**
		 * Start Of Frame (SOF) Huffman - Baseline DCT
		 */
		public const SOF0  = "\xFF\xC0";

		/**
		 * Start Of Frame (SOF) Huffman - Extended sequential DCT
		 */
		public const SOF1  = "\xFF\xC1";

		/**
		 * Start Of Frame Huffman - Progressive DCT (SOF2)
		 */
		public const SOF2  = "\xFF\xC2";

		/**
		 * Start Of Frame Huffman - Spatial (sequential) lossless (SOF3)
		 * !!!
		 */
		public const SOF3  = "\xFF\xC3";

		/**
		 * Start Of Frame Huffman - Differential sequential DCT (SOF5)
		 */
		public const SOF5  = "\xFF\xC5";

		/**
		 * Start Of Frame Huffman - Differential progressive DCT (SOF6)
		 */
		public const SOF6  = "\xFF\xC6";

		/**
		 * Start Of Frame Huffman - Differential spatial (SOF7)
		 */
		public const SOF7  = "\xFF\xC7";

		/**
		 * Start Of Frame Arithmetic - Reserved for JPEG extensions (JPG)
		 */
		public const JPG   = "\xFF\xC8";

		/**
		 * Start Of Frame Arithmetic - Extended sequential DCT (SOF9)
		 */
		public const SOF9  = "\xFF\xC9";

		/**
		 * Start Of Frame Arithmetic - Progressive DCT (SOF10)
		 */
		public const SOF10 = "\xFF\xCA";

		/**
		 * Start Of Frame Arithmetic - Spatial (sequential) lossless (SOF11)
		 */
		public const SOF11 = "\xFF\xCB";

		/**
		 * Start Of Frame Arithmetic - Differential sequential DCT (SOF13)
		 */
		public const SOF13 = "\xFF\xCD";

		/**
		 * Start Of Frame Arithmetic - Differential progressive DCT (SOF14)
		 */
		public const SOF14 = "\xFF\xCE";

		/**
		 * Start Of Frame Arithmetic - Differential spatial (SOF15)
		 */
		public const SOF15 = "\xFF\xCF";

		/**
		 * Define Huffman Table(s) (DHT)
		 */
		public const DHT   = "\xFF\xC4";

		/**
		 * Define Arithmetic coding conditioning(s) (DAC)
		 */
		public const DAC   = "\xFF\xCC";

		/**
		 * Restart with modulo 8 count 0 (RST0)
		 */
		public const RST0  = "\xFF\xD0";

		/**
		 * Restart with modulo 8 count 1 (RST1)
		 */
		public const RST1  = "\xFF\xD1";

		/**
		 * Restart with modulo 8 count 2 (RST2)
		 */
		public const RST2  = "\xFF\xD2";

		/**
		 * Restart with modulo 8 count 3 (RST3)
		 */
		public const RST3  = "\xFF\xD3";

		/**
		 * Restart with modulo 8 count 4 (RST4)
		 */
		public const RST4  = "\xFF\xD4";

		/**
		 * Restart with modulo 8 count 5 (RST5)
		 */
		public const RST5  = "\xFF\xD5";

		/**
		 * Restart with modulo 8 count 6 (RST6)
		 */
		public const RST6  = "\xFF\xD6";

		/**
		 * Restart with modulo 8 count 7 (RST7)
		 */
		public const RST7  = "\xFF\xD7";

		/**
		 * Start of Image (SOI)
		 */
		public const SOI   = "\xFF\xD8";

		/**
		 * End of Image (EOI)
		 */
		public const EOI   = "\xFF\xD9";

		/**
		 * Start of Scan (SOS)
		 */
		public const SOS   = "\xFF\xDA";

		/**
		 * Define quantization Table(s) (DQT)
		 */
		public const DQT   = "\xFF\xDB";

		/**
		 * Define Number of Lines (DNL)
		 */
		public const DNL   = "\xFF\xDC";

		/**
		 * Define Restart Interval (DRI)
		 */
		public const DRI   = "\xFF\xDD";

		/**
		 * Define Hierarchical progression (DHP)
		 */
		public const DHP   = "\xFF\xDE";

		/**
		 * Expand Reference Component(s) (EXP)
		 */
		public const EXP   = "\xFF\xDF";

		/**
		 * Application Field 0 (APP0) - usually JFIF or JFXX
		 */
		public const APP0  = "\xFF\xE0";

		/**
		 * Application Field 1 (APP1) - usually Exif or XMP/RDF
		 */
		public const APP1  = "\xFF\xE1";

		/**
		 * Application Field 2 (APP2) - usually Flashpix
		 */
		public const APP2  = "\xFF\xE2";

		/**
		 * Application Field 3 (APP3)
		 */
		public const APP3  = "\xFF\xE3";

		/**
		 * Application Field 4 (APP4)
		 */
		public const APP4  = "\xFF\xE4";

		/**
		 * Application Field 5 (APP5)
		 */
		public const APP5  = "\xFF\xE5";

		/**
		 * Application Field 6 (APP6)
		 */
		public const APP6  = "\xFF\xE6";

		/**
		 * Application Field 7 (APP7)
		 */
		public const APP7  = "\xFF\xE7";

		/**
		 * Application Field 8 (APP8)
		 */
		public const APP8  = "\xFF\xE8";

		/**
		 * Application Field 9 (APP9)
		 */
		public const APP9  = "\xFF\xE9";

		/**
		 * Application Field 10 (APP10)
		 */
		public const APP10 = "\xFF\xEA";

		/**
		 * Application Field 11 (APP11)
		 */
		public const APP11 = "\xFF\xEB";

		/**
		 * Application Field 12 (APP12) - usually [picture info]
		 */
		public const APP12 = "\xFF\xEC";

		/**
		 * Application Field 13 (APP13) - usually photoshop IRB / IPTC
		 */
		public const APP13 = "\xFF\xED";

		/**
		 * Application Field 14 (APP14)
		 */
		public const APP14 = "\xFF\xEE";

		/**
		 * Application Field 15 (APP15)
		 */
		public const APP15 = "\xFF\xEF";

		/**
		 * Reserved for JPEG extensions (JPG0)
		 */
		public const JPG0  = "\xFF\xF0";

		/**
		 * Reserved for JPEG extensions (JPG1)
		 */
		public const JPG1  = "\xFF\xF1";

		/**
		 * Reserved for JPEG extensions (JPG2)
		 */
		public const JPG2  = "\xFF\xF2";

		/**
		 * Reserved for JPEG extensions (JPG3)
		 */
		public const JPG3  = "\xFF\xF3";

		/**
		 * Reserved for JPEG extensions (JPG4)
		 */
		public const JPG4  = "\xFF\xF4";

		/**
		 * Reserved for JPEG extensions (JPG5)
		 */
		public const JPG5  = "\xFF\xF5";

		/**
		 * Reserved for JPEG extensions (JPG6)
		 */
		public const JPG6  = "\xFF\xF6";

		/**
		 * Reserved for JPEG extensions (JPG7)
		 */
		public const JPG7  = "\xFF\xF7";

		/**
		 * Reserved for JPEG extensions (JPG8)
		 */
		public const JPG8  = "\xFF\xF8";

		/**
		 * Reserved for JPEG extensions (JPG9)
		 */
		public const JPG9  = "\xFF\xF9";

		/**
		 * Reserved for JPEG extensions (JPG10)
		 */
		public const JPG10 = "\xFF\xFA";

		/**
		 * Reserved for JPEG extensions (JPG11)
		 */
		public const JPG11 = "\xFF\xFB";

		/**
		 * Reserved for JPEG extensions (JPG12)
		 */
		public const JPG12 = "\xFF\xFC";

		/**
		 * Reserved for JPEG extensions (JPG13)
		 */
		public const JPG13 = "\xFF\xFD";

		/**
		 * Comment (COM)
		 */
		public const COM   = "\xFF\xFE";

		/**
		 * For temp private use arith code (TEM)
		 */
		public const TEM   = "\xFF\x01";

		/**
		 * Reserved (RES)
		 */
		public const RES   = "\xFF\x02";

		public const SEGMENTS = [
			self::SOF0  => [
				'name' => 'SOF0',
				'description' => 'Start Of Frame (SOF) Huffman - Baseline DCT',
			],
			self::SOF1  => [
				'name' => 'SOF1',
				'description' => 'Start Of Frame (SOF) Huffman - Extended sequential DCT',
			],
			self::SOF2  => [
				'name' => 'SOF2',
				'description' => 'Start Of Frame Huffman - Progressive DCT (SOF2)',
			],
			self::SOF3  => [
				'name' => 'SOF3',
				'description' => 'Start Of Frame Huffman - Spatial (sequential) lossless (SOF3)',
			],
			self::SOF5  => [
				'name' => 'SOF5',
				'description' => 'Start Of Frame Huffman - Differential sequential DCT (SOF5)',
			],
			self::SOF6  => [
				'name' => 'SOF6',
				'description' => 'Start Of Frame Huffman - Differential progressive DCT (SOF6)',
			],
			self::SOF7  => [
				'name' => 'SOF7',
				'description' => 'Start Of Frame Huffman - Differential spatial (SOF7)',
			],
			self::JPG   => [
				'name' => 'JPG',
				'description' => 'Start Of Frame Arithmetic - Reserved for JPEG extensions (JPG)',
			],
			self::SOF9  => [
				'name' => 'SOF9',
				'description' => 'Start Of Frame Arithmetic - Extended sequential DCT (SOF9)',
			],
			self::SOF10 => [
				'name' => 'SOF10',
				'description' => 'Start Of Frame Arithmetic - Progressive DCT (SOF10)',
			],
			self::SOF11 => [
				'name' => 'SOF11',
				'description' => 'Start Of Frame Arithmetic - Spatial (sequential) lossless (SOF11)',
			],
			self::SOF13 => [
				'name' => 'SOF13',
				'description' => 'Start Of Frame Arithmetic - Differential sequential DCT (SOF13)',
			],
			self::SOF14 => [
				'name' => 'SOF14',
				'description' => 'Start Of Frame Arithmetic - Differential progressive DCT (SOF14)',
			],
			self::SOF15 => [
				'name' => 'SOF15',
				'description' => 'Start Of Frame Arithmetic - Differential spatial (SOF15)',
			],
			self::DHT   => [
				'name' => 'DHT',
				'description' => 'Define Huffman Table(s) (DHT)',
			],
			self::DAC   => [
				'name' => 'DAC',
				'description' => 'Define Arithmetic coding conditioning(s) (DAC)',
			],

			self::RST0  => [
				'name' => 'RST0',
				'description' => 'Restart with modulo 8 count 0 (RST0)',
			],
			self::RST1  => [
				'name' => 'RST1',
				'description' => 'Restart with modulo 8 count 1 (RST1)',
			],
			self::RST2  => [
				'name' => 'RST2',
				'description' => 'Restart with modulo 8 count 2 (RST2)',
			],
			self::RST3  => [
				'name' => 'RST3',
				'description' => 'Restart with modulo 8 count 3 (RST3)',
			],
			self::RST4  => [
				'name' => 'RST4',
				'description' => 'Restart with modulo 8 count 4 (RST4)',
			],
			self::RST5  => [
				'name' => 'RST5',
				'description' => 'Restart with modulo 8 count 5 (RST5)',
			],
			self::RST6  => [
				'name' => 'RST6',
				'description' => 'Restart with modulo 8 count 6 (RST6)',
			],
			self::RST7  => [
				'name' => 'RST7',
				'description' => 'Restart with modulo 8 count 7 (RST7)',
			],

			self::SOI   => [
				'name' => 'SOI',
				'description' => 'Start of Image (SOI)',
			],
			self::EOI   => [
				'name' => 'EOI',
				'description' => 'End of Image (EOI)',
			],
			self::SOS   => [
				'name' => 'SOS',
				'description' => 'Start of Scan (SOS)',
			],
			self::DQT   => [
				'name' => 'DQT',
				'description' => 'Define quantization Table(s) (DQT)',
			],
			self::DNL   => [
				'name' => 'DNL',
				'description' => 'Define Number of Lines (DNL)',
			],
			self::DRI   => [
				'name' => 'DRI',
				'description' => 'Define Restart Interval (DRI)',
			],
			self::DHP   => [
				'name' => 'DHP',
				'description' => 'Define Hierarchical progression (DHP)',
			],
			self::EXP   => [
				'name' => 'EXP',
				'description' => 'Expand Reference Component(s) (EXP)',
			],

			self::APP0  => [
				'name' => 'APP0',
				'description' => 'Application Field 0 (APP0) - usually JFIF or JFXX',
			],
			self::APP1  => [
				'name' => 'APP1',
				'description' => 'Application Field 1 (APP1) - usually Exif or XMP/RDF',
			],
			self::APP2  => [
				'name' => 'APP2',
				'description' => 'Application Field 2 (APP2) - usually Flashpix',
			],
			self::APP3  => [
				'name' => 'APP3',
				'description' => 'Application Field 3 (APP3)',
			],
			self::APP4  => [
				'name' => 'APP4',
				'description' => 'Application Field 4 (APP4)',
			],
			self::APP5  => [
				'name' => 'APP5',
				'description' => 'Application Field 5 (APP5)',
			],
			self::APP6  => [
				'name' => 'APP6',
				'description' => 'Application Field 6 (APP6)',
			],
			self::APP7  => [
				'name' => 'APP7',
				'description' => 'Application Field 7 (APP7)',
			],
			self::APP8  => [
				'name' => 'APP8',
				'description' => 'Application Field 8 (APP8)',
			],
			self::APP9  => [
				'name' => 'APP9',
				'description' => 'Application Field 9 (APP9)',
			],
			self::APP10 => [
				'name' => 'APP10',
				'description' => 'Application Field 10 (APP10)',
			],
			self::APP11 => [
				'name' => 'APP11',
				'description' => 'Application Field 11 (APP11)',
			],
			self::APP12 => [
				'name' => 'APP12',
				'description' => 'Application Field 12 (APP12) - usually [picture info]',
			],
			self::APP13 => [
				'name' => 'APP13',
				'description' => 'Application Field 13 (APP13) - usually photoshop IRB / IPTC',
			],
			self::APP14 => [
				'name' => 'APP14',
				'description' => 'Application Field 14 (APP14)',
			],
			self::APP15 => [
				'name' => 'APP15',
				'description' => 'Application Field 15 (APP15)',
			],

			self::JPG0  => [
				'name' => 'JPG0',
				'description' => 'Reserved for JPEG extensions (JPG0)',
			],
			self::JPG1  => [
				'name' => 'JPG1',
				'description' => 'Reserved for JPEG extensions (JPG1)',
			],
			self::JPG2  => [
				'name' => 'JPG2',
				'description' => 'Reserved for JPEG extensions (JPG2)',
			],
			self::JPG3  => [
				'name' => 'JPG3',
				'description' => 'Reserved for JPEG extensions (JPG3)',
			],
			self::JPG4  => [
				'name' => 'JPG4',
				'description' => 'Reserved for JPEG extensions (JPG4)',
			],
			self::JPG5  => [
				'name' => 'JPG5',
				'description' => 'Reserved for JPEG extensions (JPG5)',
			],
			self::JPG6  => [
				'name' => 'JPG6',
				'description' => 'Reserved for JPEG extensions (JPG6)',
			],
			self::JPG7  => [
				'name' => 'JPG7',
				'description' => 'Reserved for JPEG extensions (JPG7)',
			],
			self::JPG8  => [
				'name' => 'JPG8',
				'description' => 'Reserved for JPEG extensions (JPG8)',
			],
			self::JPG9  => [
				'name' => 'JPG9',
				'description' => 'Reserved for JPEG extensions (JPG9)',
			],
			self::JPG10 => [
				'name' => 'JPG10',
				'description' => 'Reserved for JPEG extensions (JPG10)',
			],
			self::JPG11 => [
				'name' => 'JPG11',
				'description' => 'Reserved for JPEG extensions (JPG11)',
			],
			self::JPG12 => [
				'name' => 'JPG12',
				'description' => 'Reserved for JPEG extensions (JPG12)',
			],
			self::JPG13 => [
				'name' => 'JPG13',
				'description' => 'Reserved for JPEG extensions (JPG13)',
			],

			self::COM   => [
				'name' => 'COM',
				'description' => 'Comment (COM)',
			],
			self::TEM   => [
				'name' => 'TEM',
				'description' => 'For temp private use arith code (TEM)',
			],
			self::RES   => [
				'name' => 'RES',
				'description' => 'Reserved (RES)',
			],
		];

		public static function getSegmentClass (string $marker) : string {
			$segmentClass = JPEGSegment::class . (self::SEGMENTS[$marker]['name'] ?? '');

			return class_exists($segmentClass) ? $segmentClass : JPEGSegment::class;
		}

		public static function getSegmentName (string $marker) : ?string {
			return self::SEGMENTS[$marker]['name'] ?? null;
		}

		public static function getSegmentDescription (string $marker) : ?string {
			return self::SEGMENTS[$marker]['description'] ?? null;
		}
	}
