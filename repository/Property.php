<?php
class Property{
     
    const REPOSITORY_NAME = "property";
    public $conn;
    public $id;
    public $name;
    public $address;
     
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function getLastIdSave($lastId){
        return $lastId;
    }
    public function save(){

        $query = "INSERT INTO ".SELF::REPOSITORY_NAME." SET name=:name, address=:address";
        $stmt = $this->conn->prepare($query);
     
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":address", $this->address);

        return ($stmt->execute()) ? true : false ;

    }
    public function readAll(){

       // $query = "SELECT `p`.id, `p`.name, `p`.address, `m`.new_image_name FROM `property` `p`, `media` `m` WHERE `m`.property_name=`p`.name ORDER BY `p`.id DESC";
        $query = "SELECT * FROM `property` ORDER BY id DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
         
        return $stmt;
    }

    public function readOne(){
         
        // $query = "SELECT * FROM " . SELF::REPOSITORY_NAME . " WHERE id = ? LIMIT 0,1";
        $query = "SELECT `p`.id, `p`.name, `p`.address, `m`.new_image_name FROM ".SELF::REPOSITORY_NAME." `p`, `media` `m` WHERE `p`.id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->address = $row['address'];
    }
    public function update(){
     
        $query = "UPDATE " . SELF::REPOSITORY_NAME . " SET 
                    name = :name, 
                    address = :address
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare($query);
     
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':id', $this->id);

        return ($stmt->execute()) ? true : false ;
    }
    public function delete(){
     
        $query = "DELETE FROM " . SELF::REPOSITORY_NAME . " WHERE id = ?";
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(1, $this->id);

        return ($stmt->execute()) ? true : false ;
    }
}