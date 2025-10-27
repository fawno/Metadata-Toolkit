<?php
  declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\JFIF;

	enum JFIFResolutionUnit : int {
		/** No Unit */
		case NOUNIT = 0x00;
		/** Pixels Per Inch */
		case PPI    = 0x01;
		/** Pixels Per Cm */
		case PPC    = 0x02;

		public function label () : string {
			return static::getLabel($this);
		}

		public static function getLabel (self $value) : string {
			return match ($value) {
				static::NOUNIT => 'No Unit',
				static::PPI => 'Pixels Per Inch',
				static::PPC => 'Pixels Per Cm',
			};
		}
	}
