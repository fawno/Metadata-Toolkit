<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata;

	use DateTime;
	use DOMDocument;
	use DOMElement;
	use DOMNamedNodeMap;
	use DOMNode;
	use DOMXPath;
	use Exception;
	use RuntimeException;

	class XMP {
		public const MAGIC = "http://ns.adobe.com/xap/1.0/\x00";

		public const IPTC4_XMP_CORE_NS = 'http://iptc.org/std/Iptc4xmpCore/1.0/xmlns/';
		public const IPTC4_XMP_EXT_NS = 'http://iptc.org/std/Iptc4xmpExt/2008-02-29/';
		public const PHOTOSHOP_NS = 'http://ns.adobe.com/photoshop/1.0/';
		public const DC_NS = 'http://purl.org/dc/elements/1.1/';
		public const XMP_RIGHTS_NS = 'http://ns.adobe.com/xap/1.0/rights/';
		public const RDF_NS = 'http://www.w3.org/1999/02/22-rdf-syntax-ns#';
		public const XMP_NS = "http://ns.adobe.com/xap/1.0/";
		public const PHOTO_MECHANIC_NS = "http://ns.camerabits.com/photomechanic/1.0/";
		public const FRAMERIGHT_IDC_NS = 'http://ns.frameright.io/idc/1.0/';

		public const NAMESPACES = [
			'rdf' => self::RDF_NS,
			'dc' => self::DC_NS,
			'photoshop' => self::PHOTOSHOP_NS,
			'xmp' => self::XMP_NS,
			'xmpRights' => self::XMP_RIGHTS_NS,
			'Iptc4xmpCore' => self::IPTC4_XMP_CORE_NS,
			'Iptc4xmpExt' => self::IPTC4_XMP_EXT_NS,
			'FramerightIdc' => self::FRAMERIGHT_IDC_NS,
			'photomechanic' => self::PHOTO_MECHANIC_NS,
		];

		protected DOMDocument $dom;
		protected DOMXPath $xpath;
		protected string $about;

		protected function __construct (?string $data = null, bool $format = false) {
			$this->dom = new DOMDocument('1.0', 'UTF-8');
			$this->dom->preserveWhiteSpace = false;
			$this->dom->formatOutput = $format;
			$this->dom->substituteEntities = false;

			$this->dom->loadXML(trim((string) $data) ?: '<x:xmpmeta xmlns:x="adobe:ns:meta/"><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><rdf:Description rdf:about="" /></rdf:RDF></x:xmpmeta>');
			$this->dom->encoding = 'UTF-8';

			if ('x:xmpmeta' !== $this->dom->documentElement->nodeName) {
				throw new RuntimeException('Root node must be of type x:xmpmeta.');
			}

			$this->xpath = new DOMXPath($this->dom);

			foreach (self::NAMESPACES as $prefix => $url) {
				$this->xpath->registerNamespace($prefix, $url);
			}

			$this->about = $this->xpath->query('//rdf:Description/@rdf:about')->item(0)?->nodeValue ?: '';
		}

		public static function create (?string $data = null, bool $format = false) : XMP {
			return new static($data, $format);
		}

		/**
		 * Reads XMP from a binary string
		 *
		 * @param string $blob Binary string
		 * @return null|XMP
		 */
		public static function readBlob (string $blob) : ?XMP {
			if (!preg_match('~<x:xmpmeta.*</x:xmpmeta>~Uims', $blob, $xmps)) {
				return null;
			}

			return static::create(current($xmps));
		}

		/**
		 * Reads XMP from filename
		 *
		 * @param string $filename
		 * @return null|XMP
		 * @throws Exception
		 */
		public static function readFile (string $filename) : ?XMP {
			if (!is_file($filename)) {
				throw new Exception('Not a file', 1);
			}

			if (false === $blob = file_get_contents($filename)) {
				throw new Exception('Error reading file', 2);
			}

			return static::readBlob($blob);
		}

		public function __toString () : string {
			$hasBegin = $hasEnd = false;

			$result = $this->xpath->query('/processing-instruction(\'xpacket\')') ?: [];

			foreach ($result as $item) {
				$hasBegin = $hasBegin ?: (false !== stripos($item->nodeValue, 'begin'));
				$hasEnd = $hasEnd ?: (false !== stripos($item->nodeValue, 'end'));
			}

			if (!$hasBegin) {
				$this->dom->insertBefore(
					$this->dom->createProcessingInstruction('xpacket', "begin=\"\xef\xbb\xbf\" id=\"W5M0MpCehiHzreSzNTczkc9d\""),
					$this->dom->documentElement // insert before root
				);
			}

			if (!$hasEnd) {
				$this->dom->appendChild($this->dom->createProcessingInstruction('xpacket', 'end="w"')); // append to end
			}

			// ensure all rdf:Description elements have an rdf:about attribute
			$descriptions = $this->xpath->query('//rdf:Description');

			for ($i = 0; $i < $descriptions->length; $i++) {
				/** @var DOMElement $desc */
				$desc = $descriptions->item($i);
				$desc->setAttributeNS(self::RDF_NS, 'rdf:about', $this->about);
			}

			return str_replace('<?xml version="1.0" encoding="UTF-8"?>' . "\n", self::MAGIC, trim($this->dom->saveXML()));
		}

		public function registerNamespace (string $prefix, string $namespace) : bool {
			return $this->xpath->registerNamespace($prefix, $namespace);
		}

		public function setAttribute (?string $namespace, string $qualifiedName, string $value) {
			foreach ($this->xpath->query('//rdf:Description') as $desc) {
				/** @var DOMElement $desc */
				if ($node = $desc->attributes->getNamedItemNS($namespace, $qualifiedName)) {
					$node->nodeValue = $value;
				} else {
					$desc->setAttributeNS($namespace, $qualifiedName, $value);
				}
			}
		}

		public function getAttributes () : ?DOMNamedNodeMap {
			return $this->xpath->query('//rdf:Description')?->item(0)?->attributes;
		}

		public function setFormatOutput (bool $formatOutput) : XMP {
			$this->dom->formatOutput = $formatOutput;

			return $this;
		}

		public function getFormatOutput () : bool {
			return $this->dom->formatOutput;
		}

		public static function fromFile (string $fileName) : XMP {
			return new self(file_get_contents($fileName));
    }

		protected function getNode (string $field, $ns, bool $checkAttributes = true) : ?DOMNode {
			$query = ($checkAttributes) ? $field . '|@' . $field : $field;

			$rdfDescriptions = $this->getRDFDescriptions($ns);
			foreach ($rdfDescriptions as $rdfDesc) {
				$result = $this->xpath->query($query, $rdfDesc);
				if ($result->length) {
					return $result->item(0);
				}
			}

			return null;
		}

		protected function getAttr (string $field, string $namespace) : ?string {
			return $this->getNode($field, $namespace)?->nodeValue ?: null;
		}

		protected function getBag (string $field, string $namespace) : ?array {
			if ($node = $this->getNode($field, $namespace, false)) {
				if ($bag = $this->xpath->query('rdf:Bag', $node)->item(0)) {
					for ($items = [], $i = 0; $i < $bag->childNodes->length; $i++) {
						$items[] = $bag->childNodes->item($i)->nodeValue;
					}

					return $items;
				}
			}

			return null;
		}

		protected function getAlt (string $field, string $namespace) : ?string {
			if ($node = $this->getNode($field, $namespace, false)) {
				if ($bag = $this->xpath->query('rdf:Alt', $node)->item(0)) {
					return $bag->childNodes->item(0)->nodeValue;
				}
			}

			return null;
		}

		protected function getSeq (string $field, string $namespace) : ?array {
			if ($node = $this->getNode($field, $namespace, false)) {
				if ($bag = $this->xpath->query('rdf:Seq', $node)->item(0)) {
					for ($items = [], $i = 0; $i < $bag->childNodes->length; $i++) {
						$items[] = $bag->childNodes->item($i)->nodeValue;
					}

					return $items;
				}
			}

			return null;
		}

		protected function getRDFDescriptions (string $namespace) : array {
			$result = [];

			$element_query = "//rdf:Description[*[namespace-uri()='$namespace']]";
			$attribute_query = "//rdf:Description[@*[namespace-uri()='$namespace']]";
			foreach([$element_query, $attribute_query] as $query) {
				$description = $this->xpath->query($query);

				if ($description->length > 0) {
					$result = array_merge($result, iterator_to_array($description));
				}
			}

			return $result;
		}

		public function getHeadline () : ?string {
			return $this->getAttr('photoshop:Headline', self::PHOTOSHOP_NS);
		}

		public function getCaption () : ?string {
			return $this->getAlt('dc:description', self::DC_NS);
		}

		public function getEvent () : ?string {
			return $this->getAttr('Iptc4xmpExt:Event', self::IPTC4_XMP_EXT_NS);
		}

		public function getLocation () : ?string {
			return $this->getAttr('Iptc4xmpCore:Location', self::IPTC4_XMP_CORE_NS);
		}

		public function getCity () : ?string {
			return $this->getAttr('photoshop:City', self::PHOTOSHOP_NS);
		}

		public function getState () : ?string {
			return $this->getAttr('photoshop:State', self::PHOTOSHOP_NS);
		}

		public function getCountry () : ?string {
			return $this->getAttr('photoshop:Country', self::PHOTOSHOP_NS);
		}

		public function getCountryCode () : ?string {
			return $this->getAttr('Iptc4xmpCore:CountryCode', self::IPTC4_XMP_CORE_NS);
		}

		public function getIPTCSubjectCodes () : ?array {
			return $this->getBag('Iptc4xmpCore:SubjectCode', self::IPTC4_XMP_CORE_NS);
		}

		/**
		 * {@inheritdoc}
		 *
		 * todo: rename to getAuthor/getCreator
		 */
		public function getPhotographerName () : string {
			$seq = $this->getSeq('dc:creator', self::DC_NS);

			return is_string($seq) ? $seq : current($seq);
		}

		public function getCredit () : ?string {
			return $this->getAttr('photoshop:Credit', self::PHOTOSHOP_NS);
		}

		public function getPhotographerTitle () : ?string {
			return $this->getAttr('photoshop:AuthorsPosition', self::PHOTOSHOP_NS);
		}

		public function getSource () : ?string {
			return $this->getAttr('photoshop:Source', self::PHOTOSHOP_NS);
		}

		public function getCopyright () : ?string {
			return $this->getAlt('dc:rights', self::DC_NS);
		}

		public function getCopyrightUrl () : ?string {
			return $this->getAttr('xmpRights:WebStatement', self::XMP_RIGHTS_NS);
		}

		public function getRightsUsageTerms () : ?string {
			return $this->getAlt('xmpRights:UsageTerms', self::XMP_RIGHTS_NS);
		}

		public function getObjectName () : ?string {
			return $this->getAttr('dc:title', self::DC_NS);
		}

		public function getCaptionWriters () : ?string {
			return $this->getAttr('photoshop:CaptionWriter', self::PHOTOSHOP_NS);
		}

		public function getInstructions () : ?string {
			return $this->getAttr('photoshop:Instructions', self::PHOTOSHOP_NS);
		}

		public function getCategory () : ?string {
			return $this->getAttr('photoshop:Category', self::PHOTOSHOP_NS);
		}

		public function getSupplementalCategories () : ?array {
			return $this->getBag('photoshop:SupplementalCategories', self::PHOTOSHOP_NS);
		}

		public function getContactAddress () : ?string {
			return $this->getContactInfo('Iptc4xmpCore:CiAdrExtadr');
		}

		public function getContactCity () : ?string {
			return $this->getContactInfo('Iptc4xmpCore:CiAdrCity');
		}

		public function getContactState () : ?string {
			return $this->getContactInfo('Iptc4xmpCore:CiAdrRegion');
		}

		public function getContactZip () : ?string {
			return $this->getContactInfo('Iptc4xmpCore:CiAdrPcode');
		}

		public function getContactCountry () : ?string {
			return $this->getContactInfo('Iptc4xmpCore:CiAdrCtry');
		}

		public function getContactEmail () : ?string {
			return $this->getContactInfo('Iptc4xmpCore:CiEmailWork');
		}

		protected function getContactInfo($field) : ?string {
			if ($contactInfo = $this->getNode('Iptc4xmpCore:CreatorContactInfo', self::IPTC4_XMP_CORE_NS)) {
				$node = $this->xpath->query($field . '|@' . $field, $contactInfo);

				if ($node->length) {
					return $node->item(0)->nodeValue;
				}
			}

			return null;
		}

		public function getContactPhone () : ?string {
			return $this->getContactInfo('Iptc4xmpCore:CiTelWork');
		}

		public function getContactUrl () : ?string {
			return $this->getContactInfo('Iptc4xmpCore:CiUrlWork');
		}

		public function getKeywords () : ?array {
			return $this->getBag('dc:subject', self::DC_NS);
		}

		public function getTransmissionReference () : ?string {
			return $this->getAttr('photoshop:TransmissionReference', self::PHOTOSHOP_NS);
		}

		public function getUrgency () : ?string {
			return $this->getAttr('photoshop:Urgency', self::PHOTOSHOP_NS);
		}

		public function getRating () : ?string {
			return $this->getAttr('xmp:Rating', self::XMP_NS);
		}

		public function getCreatorTool () : ?string {
			return $this->getAttr('xmp:CreatorTool', self::XMP_NS);
		}

		public function getPersonsShown () : ?array {
			return $this->getBag('Iptc4xmpExt:PersonInImage', self::IPTC4_XMP_EXT_NS);
		}

		public function getIntellectualGenre () : ?string {
			return $this->getAttr('Iptc4xmpCore:IntellectualGenre', self::IPTC4_XMP_CORE_NS);
		}

		public function getDateCreated () : null|false|DateTime {
			if ($date = $this->getAttr('photoshop:DateCreated', self::PHOTOSHOP_NS)) {
				switch (strlen($date)) {
					case 4:
						return DateTime::createFromFormat('Y', $date);
					case 7:
						return DateTime::createFromFormat('Y-m', $date);
					case 10:
						return DateTime::createFromFormat('Y-m-d', $date);
					default:
						return new DateTime($date);
				}
			}

			return null;
		}

		public function getAbout () : string {
			return $this->about;
		}

		public function getToolkit () : ?string {
			return $this->xpath->query('@x:xmptk', $this->dom->documentElement)->item(0)?->nodeValue;
		}

		public function getIPTCScene () : ?array {
			return $this->getBag('Iptc4xmpCore:Scene', self::IPTC4_XMP_CORE_NS);
		}

		public function getFeaturedOrganisationName () : ?array {
			return $this->getBag('Iptc4xmpExt:OrganisationInImageName', self::IPTC4_XMP_EXT_NS);
		}

		public function getFeaturedOrganisationCode() : ?array {
			return $this->getBag('Iptc4xmpExt:OrganisationInImageCode', self::IPTC4_XMP_EXT_NS);
		}
	}
