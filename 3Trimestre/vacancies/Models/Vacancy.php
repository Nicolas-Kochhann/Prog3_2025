<?php

require_once __DIR__ . "\..\Configuration\MySQL.php";

class Vacancy{
    private string $description;
    private string $date_added;
    private string $enterprise;
    private string $status;

    public function __construct($description, $enterprise, $status) {
        $this->description = $description;
        $this->enterprise = $enterprise;
        $this->status = $status;
    }

    public function getDateAdded(){
        return $this->date_added;
    }

    public function setDateAdded($date_added){
        $this->date_added = $date_added;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getEnterprise(): string {
        return $this->enterprise;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public static function listAll():array{
        $conn = new MySQL();
        $sql = "SELECT * FROM vacancies ORDER BY date_added DESC";
        $results = $conn->select($sql);
        $vacancies = array();
        foreach($results as $result){
            $v = new Vacancy($result['description'], $result['enterprise'], $result['status']);
            $v->setDateAdded($result['date_added']);
            $vacancies[] = $v;
        }
        return $vacancies;
    }

    public function save():bool{
        $conn = new MySQL();
        if (isset($this->id)){
            $sql = "UPDATE vacancies SET status='{$this->status}' WHERE id={$this->$id}";
        } else {
            $sql = "INSERT INTO vacancies (description, enterprise, status) VALUES ('$this->description', '$this->enterprise', '$this->status')";
        }
        $conn->execute($sql);
    }

    public static function changeStatus($description, $newStatus):bool{
        $conn = new MySQL();
        $sql = "UPDATE vacancies SET status='{$newStatus}' WHERE description='{$description}'";
        $conn->execute($sql);
    }
}