<?php

  declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Tests;

	use PHPUnit\Framework\TestCase as PHPUnitTestCase;

	class TestCase extends PHPUnitTestCase {
		public static function assertStringEqualsBase64(string $expectedBase64, string $actualString, string $message = '') : void {
			static::assertEquals(base64_decode($expectedBase64), $actualString, $message);
		}
	}
