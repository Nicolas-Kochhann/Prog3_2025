<?php

require_once __DIR__ . "\..\Configuration\MySQL.php";

class User {
    private int $id;
    private string $email;
    private string $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(){
        return $this->id;
    }

    public function setId(){
        $this->id = $id;
    }

    public function authenticateAdmin():bool{
        $conn = new MySQL();
        $sql = "SELECT password FROM users WHERE email = '{$this->email}'";
        $result = $conn->select($sql);
        session_start();
        $_SESSION['isAdmin'] = true;
        if ($this->password == $result[0]['password']) {
            return true;
        } else {
            return false;
        }
    }
}