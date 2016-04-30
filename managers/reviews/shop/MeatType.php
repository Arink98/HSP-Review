<?php

require __DIR__ . '/../../../AutoLoader.php';

final class MeatType extends SplEnum {

    const __default = self::UNKNOWN;

    const UNKNOWN = 0;
    const BEEF = 1;
    const CHICKEN = 2;
    const LAMB = 3;
    const MIXED = 4;
    const OTHER = 5;

    /**
     * @param $id
     * @return string
     */
    static function getById($id) {
        switch ($id) {
            case 0:
                return 'Unknown';
            case 1:
                return 'Beef';
            case 2:
                return 'Chicken';
            case 3:
                return 'Lamb';
            case 4:
                return 'Mixed';
            case 5:
                return 'Other';
        }
        return 'Unknown';
    }

    /**
     * @param $name
     * @return int
     */
    static function getByName($name) {
        switch (strtolower($name)) {
            case 'unknown':
                return 0;
            case 'beef':
                return 1;
            case 'chicken':
                return 2;
            case 'lamb':
                return 3;
            case 'mixed':
                return 4;
            case 'other':
                return 5;
        }
        return 0;
    }

}