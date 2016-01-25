<?php
include_once 'config/database.php';
include_once 'repository/Media.php';
include_once 'repository/Property.php';
 
$database = new Database();
$db = $database->getConnection();
$property = new Property($db);
$media = new Media($db);

$output_dir = "uploads/";
$property_name=isset($_GET['property_name']) ? $_GET['property_name'] : die('ERROR: Property Name not found.');

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

       	 	move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);
       	 	
            $media->name = $ImageName;
            $media->type = $ImageType;
            $media->extension = $ImageExt;
            $media->newImageName = $NewImageName;
            $media->propertyName = $property_name;
            $media->upload();
            
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