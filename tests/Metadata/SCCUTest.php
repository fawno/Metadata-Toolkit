<?php
  declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Tests\Metadata;

	use Fawno\MetadataToolkit\Metadata\SCCU;
	use Fawno\MetadataToolkit\Metadata\SCCU\SCCUType;
	use Fawno\MetadataToolkit\Metadata\SCCU\Tag\SCCUTag;
	use Fawno\MetadataToolkit\Tests\TestCase;

	class SCCUTest extends TestCase {
		public function test_create () {
			$sccu = SCCU::create();
			$this->assertInstanceOf(SCCU::class, $sccu);
			$this->assertStringEqualsBase64('U0NDVQAAABQAAQAAAAAAAAAAAAA=', $sccu->__toString());
		}

		public function test_create_tag () {
			$tag = SCCUTag::create(0, 'Resolution', SCCUType::UINT32BE);
			$this->assertStringEqualsBase64('W1sAAAAcAAQAAAAAUmVzb2x1dGlvbgAAAAAAAA==', $tag->__toString());

			$tag = SCCUTag::create("\r\nGlobal Times Today", 'Publication', SCCUType::ZTEXT);
			$this->assertStringEqualsBase64('W1sAAAAu//8AAAAAUHVibGljYXRpb24ADQpHbG9iYWwgVGltZXMgVG9kYXkAAA==', $tag->__toString());

			$tag = SCCUTag::create('XXX', 'Routed To', SCCUType::ZSTRING);
			$this->assertStringEqualsBase64('W1sAAAAaAAwAAAAAUm91dGVkIFRvAFhYWAA=', $tag->__toString());

			$tag = SCCUTag::create('00000101', 'PubDate', SCCUType::DATE);
			$this->assertStringEqualsBase64('W1sAAAAcABcAAAAAUHViRGF0ZQAwMDAwMDEwMQ==', $tag->__toString());
		}

		public function test_append () {
			$sccu = SCCU::create();
			$sccu->append(
				SCCUTag::create('XXX', 'Routed To', SCCUType::ZSTRING),
				SCCUTag::create(0, 'Resolution', SCCUType::UINT32BE),
				SCCUTag::create("\r\nGlobal Times Today", 'Publication', SCCUType::ZTEXT),
				SCCUTag::create(36636212, 'UniqueID', SCCUType::UINT32BE),
				SCCUTag::create("\r\n57", 'PageNo', SCCUType::ZSTRING),
				SCCUTag::create("\r\n16/10/2025", 'Publication Dates', SCCUType::ZSTRING),
				SCCUTag::create("\r\nCulture", 'Sections', SCCUType::ZSTRING),
				SCCUTag::create('00000101', 'PubDate', SCCUType::DATE),
			);
			$this->assertStringEqualsFile(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu', $sccu->__toString());
		}

		public function test_decode () {
			$sccu = SCCU::decode(file_get_contents(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu'));
			$this->assertStringEqualsFile(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu', $sccu->__toString());
		}

		public function test_get () {
			$sccu = SCCU::decode(file_get_contents(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu'));
			$this->assertIsArray($sccu->get());
			$this->isNull($sccu->get('Inexistent field'));
			$this->assertInstanceOf(SCCUTag::class, $sccu->get('Publication Dates'));
			$this->assertEquals("\r\n16/10/2025", $sccu->get('Publication Dates')->get());
		}

		public function test_update () {
			$sccu = SCCU::decode(file_get_contents(__DIR__ . '/examples/8B441E241B9E45DCBA90_bad.sccu'));
			$sccu->get('Publication Dates')->set("\r\n16/10/2025");
			$this->assertEquals("\r\n16/10/2025", $sccu->get('Publication Dates')->get());
			$this->assertStringEqualsFile(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu', $sccu->__toString());
		}

		public function test_delete () {
			$sccu = SCCU::decode(file_get_contents(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu'));

			$tag = $sccu->delete('Inexistent field');
			$this->isNull($tag);

			$tag = $sccu->delete('PubDate');
			$this->assertInstanceOf(SCCUTag::class, $tag);
			$this->assertStringNotEqualsFile(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu', $sccu->__toString());

			$sccu->append($tag);
			$this->assertStringEqualsFile(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu', $sccu->__toString());
		}

		public function test_replace () {
			$sccu = SCCU::decode(file_get_contents(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu'));

			$sccu->get('PubDate')->set(date('Ymd'));
			$this->assertStringNotEqualsFile(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu', $sccu->__toString());

			$sccu->replace(
				SCCUTag::create('00000101', 'PubDate', SCCUType::DATE),
			);
			$this->assertStringEqualsFile(__DIR__ . '/examples/8B441E241B9E45DCBA90.sccu', $sccu->__toString());
		}
	}
