<?php
include_once 'config/database.php';
include_once 'repository/Media.php';
 
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Property id not found.');
$database = new Database();
$db = $database->getConnection();

$media = new Media($db);
$media->id = $id;

$media->readOne();
$imageName = htmlspecialchars($media->newImageName, ENT_QUOTES);

$output_dir = "uploads/";

$dir = opendir($output_dir);

$media->delete();
unlink($output_dir. $imageName);

closedir($dir); 
