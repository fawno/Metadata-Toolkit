<?php
  declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Tests\Metadata;

	use Fawno\MetadataToolkit\Metadata\IPTC;
	use Fawno\MetadataToolkit\Metadata\IRB\Tag\IRBTagIPTCData;
	use Fawno\MetadataToolkit\Metadata\SCCU;
	use Fawno\MetadataToolkit\Metadata\SCCU\SCCUType;
	use Fawno\MetadataToolkit\Metadata\SCCU\Tag\SCCUTag;
	use Fawno\MetadataToolkit\Tests\TestCase;

	class IRBTagIPTCDataTest extends TestCase {
		public function test_create () {
			$iptc = IRBTagIPTCData::create();
			$this->assertInstanceOf(IPTC::class, $iptc);
			$this->assertInstanceOf(IRBTagIPTCData::class, $iptc);
			$this->assertStringEqualsBase64('OEJJTQQEAAAAAAAA', $iptc->__toString());
		}

		public function test_sccu () {
			$iptc = IRBTagIPTCData::create();
			$sccu = $iptc->getSCCU();
			$this->assertNull($sccu);

			$sccu = $iptc->getSCCU(true);
			$this->assertInstanceOf(SCCU::class, $sccu);
			$this->assertStringEqualsBase64('U0NDVQAAABQAAQAAAAAAAAAAAAA=', $sccu->__toString());

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
			$this->assertStringEqualsFile(__DIR__ . '/examples/8B441E241B9E45DCBA90.iptc.irb', $iptc->__toString());
		}
	}
