<?php
$property_name=isset($_GET['property_name']) ? $_GET['property_name'] : die('ERROR: Property Name not found.');
echo "<script> var propName = '".$property_name."'; </script>"; 


include_once 'config/database.php';
include_once 'repository/Media.php';
 
$database = new Database();
$db = $database->getConnection();
 
$media = new Media($db);
$media->propertyName=$property_name;
?>

<form id='upload-image-form' action='#' method='post' border='0' enctype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>
                <div id="mulitplefileuploader"></div>
                <div id="status"></div>
                <input type='hidden' name='propertyname' value='<?php echo $property_name ?>' /> 
            </td>
        </tr>
        <tr>
        	<td>
        		<button type='submit' class='btn btn-primary'>
                    <span></span> Save
                </button>
        	</td>
        </tr>
    </table>
</form>
<script>
 
$(document).ready(function()
{
	console.log(propName);
var settings = {
    url: "upload.php?property_name=" + propName,
    method: "POST",
    allowedTypes:"jpg,png,gif,doc,pdf,zip",
    fileName: "myfile",
    multiple: true,
    onSuccess:function(files,data,xhr)
    {
        $("#status").html("<font color='green'>Upload is success</font>");
        },
        afterUploadAll:function()
        {
                console.log("all images uploaded!!");
        },
    onError: function(files,status,errMsg)
    {       
        $("#status").html("<font color='red'>Upload is Failed</font>");
    }
}
$("#mulitplefileuploader").uploadFile(settings);
 
});
</script>