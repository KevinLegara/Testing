<?php
$property_id=isset($_GET['property_id']) ? $_GET['property_id'] : die('ERROR: Property Name not found.');
echo "<script> var property_id = '".$property_id."'; </script>"; 


include_once 'config/database.php';
include_once 'repository/Media.php';
 
$database = new Database();
$db = $database->getConnection();
 
$media = new Media($db);
$media->id=$property_id;
?>

<form id='upload-image-form' action='#' method='post' border='0' enctype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>
                <div id="updateMulitplefileuploader"></div>
                <div id="status"></div>
                <input type='hidden' name='propertyid' value='<?php echo $property_id ?>' /> 
            </td>
        </tr>
        <tr>
        	<td>
        		<button type='submit' class='btn btn-primary'>
                    <span></span> Change
                </button>
        	</td>
        </tr>
    </table>
</form>
<script>
 
$(document).ready(function()
{
var settings = {
    url: "changeUploadImage.php?id=" + property_id,
    method: "POST",
    allowedTypes:"jpg,png,gif,doc,pdf,zip",
    fileName: "myfile",
    multiple: true,
    onSuccess:function(files,data,xhr)
    {
        console.log("here  "+data);
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
$("#updateMulitplefileuploader").uploadFile(settings);
 
});
</script>