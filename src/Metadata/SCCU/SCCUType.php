<?php
  declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\SCCU;

	enum SCCUType : int {
		/** Unsigned long (always 32 bit, big endian byte order) */
		case UINT32BE = 0x0004;
		case ZSTRING  = 0x000C;
		case DATE     = 0x0017;
		case ZTEXT    = 0xFFFF;
	}
