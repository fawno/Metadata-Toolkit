<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Metadata\IPTC;
	use Fawno\MetadataToolkit\Metadata\IRB;
	use Fawno\MetadataToolkit\Metadata\IRB\Tag\IRBTag;
	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentAPP13 extends JPEGSegmentAPP {
		public const NAME = 'APP13';
		public const DESCRIPTION = 'Application Field 13 (APP13) - usually photoshop IRB / IPTC';
		public const MARKER = JPEGSegments::APP13;

		protected IRB $irb;

		protected function __construct (protected string $bin) {
			$this->irb = IRB::decode(substr($bin, 4));
		}

		public static function create (null|IPTC|IRBTag ...$blocks) : JPEGSegmentAPP13 {
			$bin = self::MARKER;
			$data = IRB::create(...$blocks)->__toString();
			$bin .= pack('n', strlen($data) + 2);
			$bin .= $data;

			return new static($bin);
		}

		public function getIPTC () : ?IPTC {
			return $this->irb->getIPTC();
		}

		public function setIPTC (IPTC $iptc) : JPEGSegmentAPP13 {
			$this->irb->setIPTC($iptc);

			return $this;
		}

		public function removeIPTC () : void {
			$this->irb->removeIPTC();
		}

		public function __toString(): string {
			$this->bin = self::MARKER;
			$data = $this->irb->__toString();
			$this->bin .= pack('n', strlen($data) + 2);
			$this->bin .= $data;

			return $this->bin;
		}
	}
