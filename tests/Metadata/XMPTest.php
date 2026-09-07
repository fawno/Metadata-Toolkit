<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Tests\Metadata;

	use Fawno\MetadataToolkit\Metadata\XMP;
	use Fawno\MetadataToolkit\Tests\TestCase;

	class XMPTest extends TestCase {
		public function test_create_removes_invalid_xml_control_characters () {
			$data = '<x:xmpmeta xmlns:x="adobe:ns:meta/"><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><rdf:Description rdf:about="" xmlns:exif="http://ns.adobe.com/exif/1.0/" exif:UserComment="' . "\x00\x01" . '" /></rdf:RDF></x:xmpmeta>';

			$xmp = XMP::create($data);

			$this->assertSame('', $xmp->getAttributes()?->getNamedItemNS('http://ns.adobe.com/exif/1.0/', 'UserComment')?->nodeValue);
		}
	}
