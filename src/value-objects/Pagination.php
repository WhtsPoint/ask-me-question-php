<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/value-objects/NaturalNumber.php';

class Pagination {
    private NaturalNumber $page;
    private NaturalNumber $count;

    public function __construct($page, $count) {
        $this->page = new Page($page);
        $this->count = new Count($count);
    }

    public function getPage(): int {
        return $this->page->get();
    }

    public function getCount(): int {
        return $this->count->get();
    }

    public function getLast(): int {
        return ($this->getPage() - 1) * $this->getCount();
    }

}

class Page extends NaturalNumber {}
class Count extends NaturalNumber {}