<?php

require __DIR__ . '/../../AutoLoader.php';

class User {

    /** @var int */
    private $id;

    /** @var string */
    private $username;

    /** @var string */
    private $email;

    /**
     * User constructor.
     * @param int $id
     * @param string $username
     * @param string $email
     */
    function __construct($id, $username, $email) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @param string $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

}