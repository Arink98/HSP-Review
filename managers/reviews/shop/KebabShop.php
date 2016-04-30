<?php

require __DIR__ . '/../../../AutoLoader.php';

class KebabShop {

    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $post_code;

    /**
     * KebabShop constructor.
     * @param $name
     * @param int $post_code
     */
    public function __construct($name, $post_code) {
        $this->name = $name;
        $this->post_code = $post_code;
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
     * @return int
     */
    public function getPostCode() {
        return $this->post_code;
    }

    /**
     * @param int $post_code
     */
    public function setPostCode($post_code) {
        $this->post_code = $post_code;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    public function countReviews() {
        $manager = new ReviewManager();
        return count($manager->getReviewsByShop($this));
    }

    /**
     * @return bool
     */
    public function hasReviews() {
        return $this->countReviews() > 0;
    }

}