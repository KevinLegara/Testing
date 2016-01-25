<?php
class User{
     
    private $conn;
    private $table_name = "user";
     
    public $id;
    public $name;
    public $email;
    public $password;
    public $created;

    public function __construct($db){
        $this->conn = $db;
    }
    
    public function getEmail(){
        return $this->email;
    }
   
    public function getPassword(){
        return $this->password;
    }

    public function checkUser(){
     
        $query = "SELECT * FROM " . $this->table_name . " WHERE email=:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $this->getEmail());
         
        // execute query
        if($stmt->execute()){
            return $stmt;
        }else{
            return false;
        }
    }

}