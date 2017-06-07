<?php

namespace fksTemplate\Jumbotron;

class JumbotronGroup {
    /**
     * @var JumbotronItem[]
     */
    private $items;

    public function __construct(array $items) {
        $this->items = $items;
    }

    /**
     * @return int
     */
    private function count() {
        return count($this->items);
    }

    /**
     * @return JumbotronItem|null
     */
    public function getRandom() {
        if ($this->count()) {
            return $this->items[array_rand($this->items)];
        }
        return null;
    }
}
