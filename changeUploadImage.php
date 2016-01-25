<?php
include_once 'config/database.php';
include_once 'repository/Media.php';
 
$database = new Database();
$db = $database->getConnection();

$property_image_id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Property id not found.');

$media = new Media($db);
$media->id=$property_image_id;
$media->readOne();

$name = htmlspecialchars($media->name, ENT_QUOTES);
$type = htmlspecialchars($media->type, ENT_QUOTES);
$ext = htmlspecialchars($media->extension, ENT_QUOTES);
$imageName = htmlspecialchars($media->newImageName, ENT_QUOTES);
$propName = htmlspecialchars($media->propertyName, ENT_QUOTES);

$output_dir = "uploads/";
//echo $property_image_id."<br>".$name."<br>".$type."<br>".$ext."<br>".$imageName."<br>".$propName."<br>";
if(isset($_FILES["myfile"]))
{       
    $ret = array();
    $error =$_FILES["myfile"]["error"];
    {
        if(!is_array($_FILES["myfile"]['name'])) //single file
        {
            $RandomNum   = time();

            $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name']));
            $ImageType      = $_FILES['myfile']['type']; //"image/png", image/jpeg etc.

            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

            unlink($output_dir. $imageName);
            move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);

            $media->name = $ImageName;
            $media->type = $ImageType;
            $media->extension = $ImageExt;
            $media->newImageName = $NewImageName;
            $media->propertyName = $propName;
            $media->id = $property_image_id;
            $media->update();
            
            $ret[$fileName]= $output_dir.$NewImageName;

        }
        else
        {
            $fileCount = count($_FILES["myfile"]['name']);
            for($i=0; $i < $fileCount; $i++)
            {
                $RandomNum   = time();

                $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name'][$i]));
                $ImageType      = $_FILES['myfile']['type'][$i]; //"image/png", image/jpeg etc.

                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt       = str_replace('.','',$ImageExt);
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

                $ret[$NewImageName]= $output_dir.$NewImageName;
                move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$NewImageName );
            }
        }
    }
    echo json_encode($ret);

}



?>