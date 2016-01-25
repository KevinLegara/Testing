<?php
// include database and object files
include_once 'config/database.php';
include_once 'repository/Property.php';
 
$database = new Database();
$db = $database->getConnection();
 
$property = new Property($db);
$stmt = $property->readAll();

$num = $stmt->rowCount();


if($num>0){

    echo "<table class='table table-bordered table-hover'>";
     
        echo "<tr>";
            echo "<th class='width-300-pct'>Property</th>";
            echo "<th style='text-align:center;'>Action</th>";
        echo "</tr>";
        $image = ''; 
        foreach ($stmt as $row){
            $sql = "SELECT `m`.id, `m`.new_image_name FROM media `m` WHERE property_name='".$row['name']."'";
            $query = $property->conn->prepare( $sql );
            $query->execute();
            echo "<tr>";
                echo "<td>";
                    while($row2 = $query->fetch(PDO::FETCH_ASSOC)){
                        extract($row2);
                        echo "<img height = 120 src = uploads/".$row2['new_image_name'].">
                            
                                <div class=' margin-right-1em property-image-item'>
                                    <span class='glyphicon glyphicon-edit edit-image-btn' title = 'Do you want to change this photo?'><div class = 'image-id' style = 'display-visible:none'>".$row2['id']."</div></span> 
                                    <span class='glyphicon glyphicon-remove delete-image-btn' title = 'Do you want to remove this photo?'><div class = 'image-id' style = 'display-visible:none'>".$row2['id']."</div></span>
                                </div>
                        ";
                    }
                    echo "<div class = 'propertyName'>".$row['name']."</div>";
                    echo "<div class = 'propertyAdress'>".$row['address']."</div>";
                echo "</td>";
                echo "<td style='text-align:center;'>
                            
                    <div class='property-id display-none'>".$row['id']."</div>

                        <div class='btn btn-info edit-btn margin-right-1em'>
                            <span class='glyphicon glyphicon-edit'></span> Edit Details  
                        </div>

                        <div class='btn btn-danger delete-btn'>
                            <span class='glyphicon glyphicon-remove'></span> Delete Property
                        </div>
                    </div>"; 
                echo "</td>";
            echo "</tr>";
        }
    echo "</table>";
     
}
else{
    echo "<div class='alert alert-info'>No records found.</div>";
}
