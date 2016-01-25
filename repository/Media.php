<?php
class Media{
     
    const REPOSITORY_NAME = "media";

    public $conn;
    public $id;
    public $name;
    public $type;
    public $extension;
    public $newImageName;
    public $propertyName;

    public function __construct($db){
            $this->conn = $db;
        }

    public function getId(){
        return $this->id;
    }
    public function upload(){
         
        $query = "INSERT INTO " . SELF::REPOSITORY_NAME . " 
                    SET name=:name, type=:type, extension=:extension, new_image_name=:newImageName, property_name=:propertyName";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":extension", $this->extension);
        $stmt->bindParam(":newImageName", $this->newImageName);
        $stmt->bindParam(":propertyName", $this->propertyName);

        return ($stmt->execute()) ? true : false ;
    }
    public function readAll(){

        $query = "SELECT * FROM " . SELF::REPOSITORY_NAME . " ORDER BY id DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
         
        return $stmt;
    }
     public function readOne(){
         
        $query = "SELECT * FROM ".SELF::REPOSITORY_NAME." WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->type = $row['type'];
        $this->extension = $row['extension'];
        $this->newImageName = $row['new_image_name'];
        $this->propertyName = $row['property_name'];
    }
     public function update(){
     
        $query = "UPDATE " . SELF::REPOSITORY_NAME . " SET 
                    name=:name, 
                    type=:type, 
                    extension=:extension, 
                    new_image_name=:newImageName, 
                    property_name=:propertyName
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare($query);
     
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':extension', $this->extension);
        $stmt->bindParam(':newImageName', $this->newImageName);
        $stmt->bindParam(':propertyName', $this->propertyName);
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