<?php

require __DIR__ . '/../../AutoLoader.php';

class UserManager {

    /** @var Database */
    private $database;

    function __construct() {
        $this->database = new Database();
        $this->database->query(
            'CREATE TABLE IF NOT EXISTS `Users` (' .
                '`id` INT NOT NULL AUTO_INCREMENT, ' .
                '`username` VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL, ' .
                '`email` VARCHAR(50) COLLATE utf8_unicode_ci NOT NULL, ' .
                '`password` CHAR(64) COLLATE utf8_unicode_ci NOT NULL, ' .
                '`salt` CHAR(16) COLLATE utf8_unicode_ci NOT NULL, ' .
                'PRIMARY KEY(id), ' .
                'UNIQUE KEY username(username), ' .
                'UNIQUE KEY email(email) ' .
            ')ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;'
        );
    }

    /**
     * @return array
     */
    public function getUsers() {
        $users = array();
        $query = 'SELECT * FROM `Users`;';
        try {
            $stmt = $this->database->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            die('PDOException');
        }
        $rows = $stmt->fetchAll();
        foreach ($rows as $row) {
            array_push($users, new User($row['id'], $row['username'], $row['email']));
        }
        return $users;
    }

    /**
     * @param $username
     * @return bool
     */
    public function doesUsernameExist($username) {
        return $this->getUserByUsername($username) != null;
    }

    /**
     * @param $email
     * @return bool
     */
    public function doesEmailExist($email) {
        return $this->getUserByEmail($email) != null;
    }

    /**
     * @param $username
     * @return null|User
     */
    public function getUserByUsername($username) {
        $query = 'SELECT * FROM `Users` WHERE username=:username';
        try {
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            die('PDOException');
        }
        $rows = $stmt->fetchAll();
        if (sizeof($rows) < 1) {
            return null;
        }
        $row = reset($rows);
        return new User($row['id'], $row['username'], $row['email']);

    }

    /**
     * @param $id
     * @return null|User
     */
    public function getUserById($id) {
        $query = 'SELECT * FROM `Users` WHERE id=:id';
        try {
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            die('PDOException');
        }
        $rows = $stmt->fetchAll();
        if (sizeof($rows) < 1) {
            return null;
        }
        $row = reset($rows);
        return new User($row['id'], $row['username'], $row['email']);
    }

    /**
     * @param $email
     * @return null|User
     */
    public function getUserByEmail($email) {
        $query = 'SELECT * FROM `Users` WHERE email=:email';
        try {
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            die('PDOException');
        }
        $rows = $stmt->fetchAll();
        if (sizeof($rows) < 1) {
            return null;
        }
        $row = reset($rows);
        return new User($row['id'], $row['username'], $row['email']);
    }

    /**
     * @param $username
     * @param $password
     * @param $email
     * @return User
     */
    public function newUser($username, $password, $email) {
        $query = 'INSERT INTO `Users` (username, email, password, salt) VALUES (:username, :email, :password, :salt)';
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password = hash('sha256', $password . $salt);
        $data = array(
            ':username' => $username,
            ':password' => $password,
            ':email' => $email,
            ':salt' => $salt
        );
        $id = null;
        try {
            $stmt = $this->database->prepare($query);
            $stmt->execute($data);
            $getidquery = 'SELECT * FROM `Users` WHERE username = :username';
            $idparams = array(
                ':username' => $username
            );
            $idstmt = $this->database->prepare($getidquery);
            $idstmt->execute($idparams);
            $rows = $idstmt->fetchAll();
            $row = reset($rows);
            $id = $row['id'];
        } catch (PDOException $e) {
            die('PDOException: ' . $e->getMessage());
        }
        return new User($id, $username, $email);
    }

}