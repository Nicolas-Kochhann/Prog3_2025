<?php
require_once __DIR__ . "/../Database/MySQL.php";

class Vote{
    private int $user_id;
    private int $browser_id;

    public function __construct(){
        $this->user_id = $user_id;
        $this->browser_id = $browser_id;
    }

    public function save(){
        $connection = new MySQL();
        $sql = "INSERT INTO votes(user_id, browser_id) VALUES($this->user_id, $this->browser_id)";
        $connection->execute($sql);
    }

    public static function retrieveVotesByBrowser($browser_id){
        $connection = new MySQL();
        $sql = "SELECT * FROM votes WHERE browser_id = {$browser_id}";
        $connection->select($sql);
    }
}