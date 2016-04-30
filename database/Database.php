<?php

require __DIR__ . '/../AutoLoader.php';

class Database {

    /** @var PDO */
    private $connection;

    function __construct() {
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=hsprlhqn_hsp;charset=utf8', 'hsprlhqn_sql', '', $options);
        } catch (PDOException $e) {
            echo($e->getMessage() . '<br />' . $e->getTraceAsString() . '<br />');
            die('Failed to connect to database!');
        }
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * @return PDO
     */
    public function getConnection() {
        return $this->connection;
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function prepare($sql) {
        return $this->connection->prepare($sql);
    }

}