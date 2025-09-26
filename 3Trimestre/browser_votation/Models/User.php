<?php
require_once __DIR__ . "/../Database/MySQL.php";

class User{
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function  __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function authenticate(){
        $connection = new MySQL();
        $sql = "SELECT password FROM users WHERE email = {$this->email}";
        $result = $connection->select($sql);
        if(count($result) > 0){
            password_verify($this->password, $result) ? true : false;
        } else {
            return false;
        }
    }

    public function find(){
        $connection = new MySQL();
        $sql = "SELECT name, email FROM users WHERE id = {$this->id}";
        return $connection->select($sql);
    }
}