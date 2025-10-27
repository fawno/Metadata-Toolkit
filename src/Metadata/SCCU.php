<?php
  declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata;

	use Fawno\MetadataToolkit\Metadata\SCCU\Tag\SCCUTag;

	class SCCU {
		public const MARKER = 'SCCU';

		protected array $tags = [];

		protected function __construct (SCCUTag ...$tags) {
			$this->tags = $tags;
		}

		public static function create (SCCUTag ...$tags) : SCCU {
			return new static(...$tags);
		}

		public static function decode (string $bin) : ?SCCU {
			if (static::MARKER != substr($bin, 0, 4)) {
				return null;
			}

			extract(unpack('Nlength/nver/x6/Ncount', $bin, 4));

			if ($length > strlen($bin)) {
				return null;
			}

			$bin = substr($bin, 20);

			$tags = [];

			while ($count != count($tags) and SCCUTag::MAGIC == substr($bin, 0, 2)) {
				$length = current(unpack('N', $bin, 2));

				$tags[] = SCCUTag::decode(substr($bin, 0, $length));

				$bin = substr($bin, $length);
			}

			return new static(...$tags);
		}

		public function delete (string $name) : ?SCCUTag {
			foreach ($this->tags as $key => $tag) {
				if ($tag->getName() == $name) {
					unset($this->tags[$key]);
					return $tag;
				}
			}

			return null;
		}

		public function get (?string $name = null) : null|array|SCCUTag {
			if (!$name) {
				return $this->tags;
			}

			foreach ($this->tags as $tag) {
				if ($tag->getName() == $name) {
					return $tag;
				}
			}

			return null;
		}

		public function set (SCCUTag ...$tags) : SCCU {
			$this->tags = $tags;

			return $this;
		}

		public function append (SCCUTag ...$tags) : SCCU {
			$this->tags = array_merge($this->tags, $tags);

			return $this;
		}

		public function replace (SCCUTag ...$tags) : SCCU {
			foreach ($tags as $tag) {
				$this->delete($tag->getName());
			}

			return $this->append(...$tags);
		}

		public function __toString () {
			$data = pack('nx6N', 1, count($this->tags));
			$data .= implode($this->tags);
      $bin = static::MARKER . pack('N', strlen($data) + 8) . $data;

      return $bin;
		}
	}
