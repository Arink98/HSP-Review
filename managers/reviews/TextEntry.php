<?php

require __DIR__ . '/../../AutoLoader.php';

class TextEntry {

    /** @var int */
    private $id;

    /** @var string */
    private $content;

    /**
     * TextEntry constructor.
     * @param $id
     * @param $content
     */
    public function __construct($id, $content) {
        $this->id = $id;
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content) {
        $this->content = $content;
    }

}