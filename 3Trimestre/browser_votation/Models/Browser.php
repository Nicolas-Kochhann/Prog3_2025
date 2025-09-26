<?php
require_once __DIR__.'/,,/Database/MySQL.php';

class Browser{
    private int $id;
    private string $name;
    private string $image;

    public function __construct($id, $name, $image){
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
    }

    public function getName() : string{
        return $this->name;
    }

    public function getImage() : string{
        return $this->image;
    }

    public static function findAll() : array {
        $connection = new MySQL();
        $sql = "SELECT * FROM browsers";
        $results = $connection->select($sql);
        $browsers = array();
        foreach($results as $result){
            $browser = new Browser($result['id'], $result['name'], $result['image']);
            $browsers[] = $browser;
        }
        return $browsers;
    }
}