<?php

require __DIR__ . '/../../AutoLoader.php';

class Review {

    /** Required */


    /** @var int */
    private $id;

    /** @var User */
    private $creator;

    /** @var string */
    private $timestamp;


    /** @var KebabShop */
    private $shop;

    /** @var int */
    private $overall_rating;

    /** @var TextEntry */
    private $overall_text;


    /** @var float */
    private $price;



    /** Optionals */


    /** @var int */
    private $greeting_rating;

    /** @var TextEntry */
    private $greeting_text;


    /** @var int */
    private $signage_rating;

    /** @var TextEntry */
    private $signage_text;


    /** @var int */
    private $meat_type;

    /** @var int */
    private $meat_rating;

    /** @var TextEntry */
    private $meat_text;


    /** @var int */
    private $box_type;


    /** @var int */
    private $chip_rating;

    /** @var TextEntry */
    private $chip_text;


    /** @var boolean */
    private $saucy;
    
    /** @var int */
    private $sauce_rating;
    
    /** @var TextEntry */
    private $sauce_text;


    /** @var boolean */
    private $cheesy;

    /** @var int */
    private $cheese_rating;

    /** @var TextEntry */
    private $cheese_text;


    /**
     * Review constructor.
     * @param User $creator
     * @param string $timestamp
     * @param KebabShop $shop
     * @param $price
     * @param int $overall_rating
     * @param TextEntry $overall_text
     */
    public function __construct($creator, $timestamp, $shop, $price, $overall_rating, $overall_text) {
        $this->creator = $creator;
        $this->timestamp = $timestamp;
        $this->shop = $shop;
        $this->price = $price;
        $this->overall_rating = $overall_rating;
        $this->overall_text = $overall_text;
        $this->saucy = false;
        $this->cheesy = false;
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
    public function getId() {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getCreator() {
        return $this->creator;
    }

    /**
     * @return string
     */
    public function getTimestamp() {
        return $this->timestamp;
    }

    /**
     * @return KebabShop
     */
    public function getShop() {
        return $this->shop;
    }

    /**
     * @param KebabShop $shop
     */
    public function setShop($shop) {
        $this->shop = $shop;
    }

    /**
     * @return int
     */
    public function getOverallRating() {
        return $this->overall_rating;
    }

    /**
     * @param int $overall_rating
     */
    public function setOverallRating($overall_rating) {
        $this->overall_rating = $overall_rating;
    }

    /**
     * @return TextEntry
     */
    public function getOverallText() {
        return $this->overall_text;
    }

    /**
     * @param TextEntry $overall_text
     */
    public function setOverallText($overall_text) {
        $this->overall_text = $overall_text;
    }

    /**
     * @return int
     */
    public function getGreetingRating() {
        return $this->greeting_rating;
    }

    /**
     * @param int $greeting_rating
     */
    public function setGreetingRating($greeting_rating) {
        $this->greeting_rating = $greeting_rating;
    }

    /**
     * @return TextEntry
     */
    public function getGreetingText() {
        return $this->greeting_text;
    }

    /**
     * @param TextEntry $greeting_text
     */
    public function setGreetingText($greeting_text) {
        $this->greeting_text = $greeting_text;
    }

    /**
     * @return float
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getSignageRating() {
        return $this->signage_rating;
    }

    /**
     * @param int $signage_rating
     */
    public function setSignageRating($signage_rating) {
        $this->signage_rating = $signage_rating;
    }

    /**
     * @return TextEntry
     */
    public function getSignageText() {
        return $this->signage_text;
    }

    /**
     * @param TextEntry $signage_text
     */
    public function setSignageText($signage_text) {
        $this->signage_text = $signage_text;
    }

    /**
     * @return int
     */
    public function getMeatType() {
        return $this->meat_type;
    }

    /**
     * @param int $meat_type
     */
    public function setMeatType($meat_type) {
        $this->meat_type = $meat_type;
    }

    /**
     * @return string
     */
    public function getMeatName() {
        return MeatType::getById($this->getMeatType());
    }

    /**
     * @return int
     */
    public function getMeatRating() {
        return $this->meat_rating;
    }

    /**
     * @param int $meat_rating
     */
    public function setMeatRating($meat_rating) {
        $this->meat_rating = $meat_rating;
    }

    /**
     * @return TextEntry
     */
    public function getMeatText() {
        return $this->meat_text;
    }

    /**
     * @param TextEntry $meat_text
     */
    public function setMeatText($meat_text) {
        $this->meat_text = $meat_text;
    }

    /**
     * @return int
     */
    public function getBoxType() {
        return $this->box_type;
    }

    /**
     * @param int $box_type
     */
    public function setBoxType($box_type) {
        $this->box_type = $box_type;
    }

    /**
     * @return string
     */
    public function getBoxName() {
        return BoxType::getById($this->getBoxType());
    }

    /**
     * @return int
     */
    public function getChipRating() {
        return $this->chip_rating;
    }

    /**
     * @param int $chip_rating
     */
    public function setChipRating($chip_rating) {
        $this->chip_rating = $chip_rating;
    }

    /**
     * @return TextEntry
     */
    public function getChipText() {
        return $this->chip_text;
    }

    /**
     * @param TextEntry $chip_text
     */
    public function setChipText($chip_text) {
        $this->chip_text = $chip_text;
    }

    /**
     * @return boolean
     */
    public function isSaucy() {
        return $this->saucy;
    }

    /**
     * @param boolean $saucy
     */
    public function setSaucy($saucy) {
        $this->saucy = $saucy;
    }

    /**
     * @return int
     */
    public function getSauceRating() {
        return $this->sauce_rating;
    }

    /**
     * @param int $sauce_rating
     */
    public function setSauceRating($sauce_rating) {
        $this->sauce_rating = $sauce_rating;
    }

    /**
     * @return TextEntry
     */
    public function getSauceText() {
        return $this->sauce_text;
    }

    /**
     * @param TextEntry $sauce_text
     */
    public function setSauceText($sauce_text) {
        $this->sauce_text = $sauce_text;
    }

    /**
     * @return boolean
     */
    public function isCheesy() {
        return $this->cheesy;
    }

    /**
     * @param boolean $cheesy
     */
    public function setCheesy($cheesy) {
        $this->cheesy = $cheesy;
    }

    /**
     * @return int
     */
    public function getCheeseRating() {
        return $this->cheese_rating;
    }

    /**
     * @param int $cheese_rating
     */
    public function setCheeseRating($cheese_rating) {
        $this->cheese_rating = $cheese_rating;
    }

    /**
     * @return TextEntry
     */
    public function getCheeseText() {
        return $this->cheese_text;
    }

    /**
     * @param TextEntry $cheese_text
     */
    public function setCheeseText($cheese_text) {
        $this->cheese_text = $cheese_text;
    }

}