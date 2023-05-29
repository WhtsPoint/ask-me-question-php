<?php

require_once __DIR__ . '/../../vendor/autoload.php';

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