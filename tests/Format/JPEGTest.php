<?php
  declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Tests\Format;

	use Exception;
	use Fawno\MetadataToolkit\Format\JPEG;
	use PHPUnit\Framework\TestCase;

	class JPEGTest extends TestCase {
		public function test_readImage () {
			$this->expectException(Exception::class);
			$this->expectExceptionMessage('Not a file');
			$this->expectExceptionCode(1);
			$jpeg = JPEG::readImage('');

			/*
			$this->expectException(Exception::class);
			$this->expectExceptionMessage('Error reading file');
			$this->expectExceptionCode(2);
			$jpeg = JPEG::readImage('');
			*/

			$this->expectException(Exception::class);
			$this->expectExceptionMessage('Not a jpg image');
			$this->expectExceptionCode(3);
			$jpeg = JPEG::readImage(__DIR__ . '/examples/Metadata_test_file.md');

			$jpeg = JPEG::readImage(__DIR__ . '/examples/Metadata_test_file.jpg');
			$this->assertInstanceOf(JPEG::class, $jpeg);
		}

		public function test_readImageBlob () {
			$this->expectException(Exception::class);
			$this->expectExceptionMessage('Not a jpg image');
			$this->expectExceptionCode(3);
			JPEG::readImageBlob('');

			$jpeg = JPEG::readImageBlob(file_get_contents(__DIR__ . '/examples/Metadata_test_file.jpg'));
			$this->assertInstanceOf(JPEG::class, $jpeg);
		}

		public function test_getImageBlob () {
			$jpeg = JPEG::readImage(__DIR__ . '/examples/Philips_PM5544-150.jpg');
			$this->assertEquals($jpeg->__toString(), $jpeg->getImageBlob());
			$this->assertEquals(file_get_contents(__DIR__ . '/examples/Philips_PM5544-150.jpg'), $jpeg->getImageBlob());
		}

		public function test_comment () {
			$jpeg = JPEG::readImage(__DIR__ . '/examples/Philips_PM5544-150.jpg');
			$comment = $jpeg->getComment();
			$this->assertEquals("Philips circle pattern\rPM5544 with non-PAL signals", $comment);

			$expected_comment = 'Test comment ' . time();
			$jpeg->setComment($expected_comment);
			$jpeg = $jpeg->getImageBlob();
			$jpeg = JPEG::readImageBlob($jpeg);
			$actual_comment = $jpeg->getComment();
			$this->assertEquals($expected_comment, $actual_comment);
		}

		public function test_write () {
			$jpeg = JPEG::readImage(__DIR__ . '/examples/Philips_PM5544-150.jpg');
			$this->assertIsInt($jpeg->writeImage(__DIR__ . '/test.jpg'));
			$this->assertFileEquals(__DIR__ . '/examples/Philips_PM5544-150.jpg', __DIR__ . '/test.jpg');
			unlink(__DIR__ . '/test.jpg');
		}
	}
