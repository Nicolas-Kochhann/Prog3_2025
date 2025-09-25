<?php
require __DIR__ . "/config.php";

class MySQL{
    private mysqli $connection;

    public function __construct(){
        $this->connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
        $this->connection->set_charset("utf8");
    }

    public function execute($sql){
		$result = $this->connection->query($sql);
		return $result;
	}
	public function select($sql){
		$result = $this->connection->query($sql);
		$item = array();
		$data = array();
		while($item = mysqli_fetch_array($result)){
			$data[] = $item;
		}
		return $data;
	}
}