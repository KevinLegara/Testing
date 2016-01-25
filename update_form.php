<?php
$property_id=isset($_GET['property_id']) ? $_GET['property_id'] : die('ERROR: Property ID not found.');

include_once 'config/database.php';
include_once 'repository/Property.php';
 
$database = new Database();
$db = $database->getConnection();
 
$property = new Property($db);

$property->id=$property_id;

$property->readOne();
?>
<form id='update-property-form' action='#' method='post' border='0'>
    <table class='table table-bordered table-hover'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' value='<?php echo htmlspecialchars($property->name, ENT_QUOTES); ?>' required /></td>
        </tr>
        <tr>
            <td>Addres</td>
            <td>
            <textarea name='address' class='form-control' required><?php echo htmlspecialchars($property->address, ENT_QUOTES); ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type='hidden' name='id' value='<?php echo $property_id ?>' /> 
            </td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-edit'></span> Save
                </button>
            </td>
        </tr>
    </table>
</form>