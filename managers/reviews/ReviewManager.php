<?php

require __DIR__ . '/../../AutoLoader.php';

include_once(dirname(__FILE__) . '/../../database/Database.php');
include_once(dirname(__FILE__) . '/../user/UserManager.php');
include_once(dirname(__FILE__) . '/shop/ShopManager.php');

class ReviewManager {

    /** @var Database */
    private $database;
    /** @var array */
    private $reviews = array();
    /** @var ShopManager */
    private $shopManager;
    /** @var TextManager */
    private $textManager;

    public function __construct() {
        $this->database = new Database();
        $tablestmt = $this->database->prepare(
            'CREATE TABLE IF NOT EXISTS `Reviews` (' .
                '`id` INT NOT NULL AUTO_INCREMENT, ' .
                '`creatorid` INT NOT NULL, ' .
                '`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, ' .
                '`shopid` INT NOT NULL, ' .
                '`overallrating` INT NOT NULL, ' .
                '`overalltext` INT NOT NULL, ' .
                '`price` FLOAT NOT NULL, ' .
                '`greetingrating` INT, ' .
                '`greetingtext` INT, ' .
                '`signagerating` INT, ' .
                '`signagetext` INT, ' .
                '`meattype` INT, ' .
                '`meatrating` INT, ' .
                '`meattext` INT, ' .
                '`boxtype` INT, ' .
                '`chiprating` INT, ' .
                '`chiptext` INT, ' .
                '`saucy` BOOLEAN, ' .
                '`saucerating` INT, ' .
                '`saucetext` INT, ' .
                '`cheesy` BOOLEAN, ' .
                '`cheeserating` INT, ' .
                '`cheesetext` INT, ' .
                'PRIMARY KEY(id) ' .
            ') ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;'
        );
        $tablestmt->execute();
        $this->textManager = new TextManager();
        $this->shopManager = new ShopManager();
        $this->loadReviews();
    }

    private function loadReviews() {
        $this->posts = array();
        $userManager = new UserManager();
        $stmt = $this->database->prepare(
            'SELECT * FROM `Reviews` ORDER BY `time` DESC;'
        );
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $review = new Review($userManager->getUserById($row['creatorid']), $row['time'], $this->shopManager->getShopById($row['shopid']), $row['price'], $row['overallrating'], $this->textManager->getTextById($row['overalltext']));

                $review->setId($row['id']);

                if (isset($row['greetingrating'])) {
                    $review->setGreetingRating($row['greetingrating']);
                    if (isset($row['greetingtext'])) {
                        $review->setGreetingText($this->textManager->getTextById($row['greetingtext']));
                    }
                }

                if (isset($row['signagerating'])) {
                    $review->setSignageRating($row['signagerating']);
                    if (isset($row['signagetext'])) {
                        $review->setSignageText($this->textManager->getTextById($row['signagetext']));
                    }
                }

                if (isset($row['meattype'])) {
                    $review->setMeatType($row['meattype']);
                }

                if (isset($row['meatrating'])) {
                    $review->setMeatRating($row['meatrating']);
                    if (isset($row['meattext'])) {
                        $review->setMeatText($this->textManager->getTextById($row['meattext']));
                    }
                }

                if (isset($row['boxtype'])) {
                    $review->setBoxType($row['boxtype']);
                }

                if (isset($row['chiprating'])) {
                    $review->setChipRating($row['chiprating']);
                    if (isset($row['chiptext'])) {
                        $review->setChipText($this->textManager->getTextById($row['chiptext']));
                    }
                }

                if (isset($row['saucy'])) {
                    $review->setSaucy($row['saucy']);
                    if ($review->isSaucy()) {
                        if (isset($row['saucerating'])) {
                            $review->setSauceRating($row['saucerating']);
                            if (isset($row['saucetext'])) {
                                $review->setSauceText($this->textManager->getTextById($row['saucetext']));
                            }
                        }
                    }
                }

                if (isset($row['cheesy'])) {
                    $review->setCheesy($row['cheesy']);
                    if ($review->isCheesy()) {
                        if (isset($row['cheeserating'])) {
                            $review->setCheeseRating($row['cheeserating']);
                            if (isset($row['cheesetext'])) {
                                $review->setCheeseText($this->textManager->getTextById($row['cheesetext']));
                            }
                        }
                    }
                }
                
                array_push($this->reviews, $review);
            }
        }
        array_reverse($this->reviews);
    }

    /**
     * @param Review $review
     */
    public function newReview($review) {
        $timestamp = date('Y-m-d G:i:s');
        $stmt = $this->database->prepare(
            'INSERT INTO `Reviews` (creatorid, `time`, shopid, overallrating, overalltext, price, greetingrating, greetingtext, signagerating, signagetext, meattype, meatrating, meattext, boxtype, chiprating, chiptext, saucy, saucerating, saucetext, cheesy, cheeserating, cheesetext) ' .
            'VALUES (:creatorid, :time, :shopid, :overallrating, :overalltext, :price, :greetingrating, :greetingtext, :signagerating, :signagetext, :meattype, :meatrating, :meattext, :boxtype, :chiprating, :chiptext, :saucy, :saucerating, :saucetext, :cheesy, :cheeserating, :cheesetext);'
        );
        $stmt->execute(array(
            ':creatorid' => $review->getCreator()->getId(),
            ':time' => $timestamp,
            ':shopid' => $review->getShop()->getId(),
            ':overallrating' => $review->getOverallRating(),
            ':overalltext' => $review->getOverallText() != null ? $review->getOverallText()->getId() : null,
            ':price' => $review->getPrice(),
            ':greetingrating' => $review->getGreetingRating(),
            ':greetingtext' => $review->getGreetingText() != null ? $review->getGreetingText()->getId() : null,
            ':signagerating' => $review->getSignageRating(),
            ':signagetext' => $review->getSignageText() != null ? $review->getSignageText()->getId() : null,
            ':meattype' => $review->getMeatType(),
            ':meatrating' => $review->getMeatRating(),
            ':meattext' => $review->getMeatText() != null ? $review->getMeatText()->getId() : null,
            ':boxtype' => $review->getBoxType(),
            ':chiprating' => $review->getCheeseRating(),
            ':chiptext' => $review->getChipText() != null ? $review->getChipText()->getId() : null,
            ':saucy' => $review->isSaucy(),
            ':saucerating' => $review->getSignageRating(),
            ':saucetext' => $review->getSauceText() != null ? $review->getSauceText()->getId() : null,
            ':cheesy' => $review->isCheesy(),
            ':cheeserating' => $review->getCheeseRating(),
            ':cheesetext' => $review->getCheeseText() != null ? $review->getCheeseText()->getId() : null
        ));
        array_push($this->reviews, $review);
    }

    public function deleteReview($id) {
        $stmt = $this->database->prepare(
            'DELETE FROM `Reviews` WHERE id=:id;'
        );
        $stmt->execute(array(
            ':id' => $id
        ));
        $this->loadReviews();
    }

    /**
     * @return array
     */
    public function getReviews() {
        return $this->reviews;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getReviewById($id) {
        $reviews = array();
        /** @var Review $review */
        foreach ($this->getReviews() as $review) {
            if ($review->getId() === $id) {
                array_push($reviews, $review);
            }
        }
        return $reviews;
    }

    /**
     * @param KebabShop $shop
     * @return array
     */
    public function getReviewsByShop($shop) {
        $reviews = array();
        /** @var Review $review */
        foreach ($this->reviews as $review) {
            if ($review->getShop()->getId() === $shop->getId()) {
                array_push($reviews, $review);
            }
        }
        return $reviews;
    }

}