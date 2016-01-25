<?php
include_once 'config/database.php';
include_once 'repository/Property.php';
include_once 'repository/Media.php';
 
$database = new Database();
$db = $database->getConnection();
 
$property = new Property($db);
$property->id=$_POST['id'];
$property->delete();

$media = new Media($db);
$media->id =$_POST['id'];

$media->readOne();
$imageName = htmlspecialchars($media->newImageName, ENT_QUOTES);

$output_dir = "uploads/";

$dir = opendir($output_dir);
unlink($output_dir. $imageName);
$media->delete();
closedir($dir); 
