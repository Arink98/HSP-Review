<?php

require __DIR__ . '/../../../AutoLoader.php';

final class BoxType extends SplEnum {

    const __default = self::UNKNOWN;

    const UNKNOWN = 0;
    const STYROFOAM = 1;
    const CARDBOARD = 2;
    const PLATE = 3;
    const PLASTIC = 4;
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
                return 'Styrofoam';
            case 2:
                return 'Cardboard';
            case 3:
                return 'Plate';
            case 4:
                return 'Plastic';
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
            case 'styrofoam':
                return 1;
            case 'cardboard':
                return 2;
            case 'plate':
                return 3;
            case 'plastic':
                return 4;
            case 'other':
                return 5;
        }
        return 0;
    }

}