<?php

require __DIR__ . '/../../../AutoLoader.php';

include_once(dirname(__FILE__) . '/../../../database/Database.php');

class ShopManager {

    /** @var Database */
    private $database;

    /** @var array */
    private $shops = array();

    /**
     * ShopManager constructor.
     */
    public function __construct() {
        $this->database = new Database();
        $tablestmt = $this->database->prepare(
            'CREATE TABLE IF NOT EXISTS `Shops` (' .
                '`id` INT NOT NULL AUTO_INCREMENT, ' .
                '`name` VARCHAR(102) COLLATE utf8_unicode_ci NOT NULL, ' .
                '`postcode` INT NOT NULL, ' .
                'PRIMARY KEY(id) ' .
            ')ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;'
        );
        $tablestmt->execute();
        $this->loadShops();
    }

    private function loadShops() {
        $this->shops = array();
        $stmt = $this->database->prepare(
            'SELECT * FROM `Shops` ORDER BY `id` DESC;'
        );
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $shop = new KebabShop($row['name'], $row['postcode']);
                $shop->setId($row['id']);
                array_push($this->shops, $shop);

            }
        }
    }

    /**
     * @return array
     */
    public function getShops() {
        return $this->shops;
    }


    /**
     * @param KebabShop $shop
     */
    public function newShop($shop) {
        $stmt = $this->database->prepare(
            'INSERT INTO `Shops` (`name`, `postcode`) VALUES (:name, :postcode);'
        );
        $stmt->execute(array(
            ':name' => $shop->getName(),
            ':postcode' => $shop->getPostCode()
        ));
        $shop->setId($this->database->getConnection()->lastInsertId());
        array_push($this->shops, $shop);
    }

    /**
     * @param int $id
     * @return KebabShop | null
     */
    public function getShopById($id) {
        foreach ($this->shops as $shop) {
            if ($shop->getId() == $id) {
                return $shop;
            }
        }
        return null;
    }

    /**
     * @param int $zip
     * @return array
     */
    public function getShopsByPostcode($zip) {
        $shops = array();
        /** @var KebabShop $shop */
        foreach ($this->shops as $shop) {
            if ($shop->getPostCode() == $zip) {
                array_push($shops, $shop);
            }
        }
        return $shops;
    }

    /**
     * @param int $name
     * @return array
     */
    public function getShopsByName($name) {
        $shops = array();
        /** @var KebabShop $shop */
        foreach ($this->shops as $shop) {
            similar_text($shop->getName(), $name, $percent);
            if ($percent >= 70) {
                $singleton = array($shop->getId() => $percent);
                $shops = $shops + $singleton;
            }
        }
        uasort($shops, function($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return $a < $b ? 1 : -1;
        });
        $newShops = array();
        foreach (array_keys($shops) as $key) {
            array_push($newShops, $this->getShopById($key));
        }
        return $newShops;
    }

    public function getShopByExactName($name) {
        foreach ($this->shops as $shop) {
            if (strtolower($shop->getName()) == strtolower($name)) {
                return $shop;
            }
        }
        return null;
    }

}