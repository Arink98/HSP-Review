<?php

require __DIR__ . '/../../AutoLoader.php';

include_once(dirname(__FILE__) . '/../../database/Database.php');

class TextManager {

    /** @var Database */
    private $database;
    /** @var array */
    private $entries = array();

    public function __construct() {
        $this->database = new Database();
        $tablestmt = $this->database->prepare(
            'CREATE TABLE IF NOT EXISTS `Text` (' .
                '`id` INT NOT NULL AUTO_INCREMENT, ' .
                '`text` TEXT(20000) COLLATE utf8_unicode_ci NOT NULL, ' .
                'PRIMARY KEY(id) ' .
            ') ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1'
        );
        $tablestmt->execute();
        $this->load();
    }

    private function load() {
        $stmt = $this->database->prepare(
            'SELECT * FROM `Text` ORDER BY `id` ASC;'
        );
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($this->entries, new TextEntry($row['id'], $row['text']));
            }
        }
    }

    /**
     * @param $id
     * @return TextEntry
     */
    public function getTextById($id) {
        foreach ($this->entries as $entry) {
            if ($entry->getId() === $id) {
                return $entry;
            }
        }
        return null;
    }

    /**
     * @param string $content
     * @return TextEntry
     */
    public function newText($content) {
        $stmt = $this->database->prepare(
            'INSERT INTO `Text` (text) VALUES (:text);'
        );
        $stmt->execute(array(
            ':text' => $content
        ));
        $entry = new TextEntry($this->database->getConnection()->lastInsertId(), $content);
        array_push($this->entries, $entry);
        return $entry;
    }

    /**
     * @return array
     */
    public function getText() {
        return $this->entries;
    }

}