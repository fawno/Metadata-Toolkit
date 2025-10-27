<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Format\JPEG\Segment;

	use Fawno\MetadataToolkit\Format\JPEG\JPEGSegments;

	class JPEGSegmentCOM extends JPEGSegmentMetadata {
		public const NAME = 'COM';
		public const DESCRIPTION = 'Comment (COM)';
		public const MARKER = JPEGSegments::COM;

		protected string $marker = self::MARKER;
		protected int $length;
		protected string $comment;

		protected function __construct (protected string $bin) {
			$com = unpack('Z2marker/nlength/Z*comment', $bin);

			foreach ($com as $key => $value) {
				$this->$key = $value;
			}
		}

		public static function create (string $comment) : JPEGSegmentCOM {
			$bin = self::MARKER;
			$bin .= pack('n', strlen($comment) + 2);
			$bin .= $comment;

			return new static($bin);
		}

		public function get () : string {
			return $this->comment;
		}

		public function set (string $comment) : JPEGSegmentCOM {
			$this->comment = $comment;

			return $this;
		}

		public function __toString() : string {
			$this->bin = self::MARKER;
			$this->bin .= pack('nZ*', strlen($this->comment) + 3, $this->comment);

			return $this->bin;
		}
	}
