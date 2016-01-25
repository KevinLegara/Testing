<?php
include_once 'config/database.php';
include_once 'repository/Property.php';
 
$database = new Database();
$db = $database->getConnection();
 
$property = new Property($db);
 
$property->name=$_POST['name'];
$property->address=$_POST['address'];
$property->imageId=$_POST['imageId'];
$property->id=$_POST['id'];
     
$property->update();
