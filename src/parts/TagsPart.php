<?php
namespace gossi\swagger\parts;

use gossi\swagger\Tag;
use phootwork\collection\ArrayList;
use phootwork\collection\Map;

trait TagsPart {

	private $tags;

	private function parseTags(Map $data) {
		$this->tags = new ArrayList();
		foreach ($data->get('tags', []) as $t) {
			$this->tags->add(new Tag($t));
		}
	}

	/**
	 * Return tags
	 *
	 * @return ArrayList
	 */
	public function getTags() {
		return $this->tags;
	}

	protected function exportTags() {
		$out = [];
		foreach ($this->tags as $tag) {
			if ($tag->isObject()) {
				$out[] = $tag->toArray();
			} else {
				$out[] = $tag->getName();
			}
		}

		return $out;
	}

}
