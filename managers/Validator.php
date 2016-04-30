<?php

require __DIR__ . '/../AutoLoader.php';

class Validator {

    public function __construct() {
    }

    /**
     * @param string $username
     * @return int
     */
    public function usernameValid($username) {
        return preg_match('/^[A-Za-z0-9_]+$/', $username);
    }

    public function shopNameValid($shopName) {
        return preg_match("/^[A-Za-z0-9\\ \\,\\-\\:\\'\\\"]+$/", $shopName);
    }

    /**
     * @param string $email
     * @return bool
     */
    public function emailValid($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email);
    }

    /**
     * @param $str
     * @return int
     */
    public function isPostcode($str) {
        return preg_match('(\d{4})', preg_replace('/\s+/', '', $str));
    }

}