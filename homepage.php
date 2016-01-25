<?php
session_start();
(!isset($_SESSION['user_session'])) ? header("location: index.php") : ' ';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>List of Properties</title>
     
    <link href="libs/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" media="screen" />
    <link href="public/css/style.css" rel="stylesheet" media="screen" />
</head>
<body>
 
    <!-- container -->
    <div class="container">
     <div class='alert alert-success'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Hello '<?php echo $_SESSION['user_session']; ?></strong><br>
        Welcome to real estate property app.
    </div>

        <div class='page-header'>
            <h1 id='page-title'>List of Properties</h1>
        </div>

            <div class='margin-bottom-1em overflow-hidden'>
                <div id='read-properties' class='btn btn-primary pull-right display-none'>
                    <span class='glyphicon glyphicon-list'></span> List of properties
                </div>

                <div id='create-property' class='btn btn-primary pull-right'>
                    <span class='glyphicon glyphicon-plus'></span> Post new property
                </div>
                 
                <div id='loader-image'><img src='public/images/ajax-loader.gif' /></div>
            </div>
         
        <div id='page-content'></div>

         
    </div>
<script src="libs/js/jquery.js"></script>
<script src="libs/js/jquery.fileuploadmulti.min.js"></script>
<script src="libs/js/bootstrap/dist/js/bootstrap.min.js"></script>
  
<script type='text/javascript'>
function changePageTitle(page_title){  
    $('#page-title').text(page_title);
     
    document.title=page_title;
}

$(document).ready(function(){


    $(document).on('click', '.delete-btn', function(){ 
        if(confirm('Are you sure?')){
         
            var property_id = $(this).closest('td').find('.property-id').text();
             
            $.post("delete.php", { id: property_id })
                .done(function(data){
                    console.log(data);
                     
                    $('#loader-image').show();
                    showProperties();
                     
                });
        }
    });

    $(document).on('submit', '#update-property-form', function() {
    
        $('#loader-image').show();
         
        $.post("update.php", $(this).serialize())
            .done(function(data) {
                 
                $('#create-property').show();
                $('#read-properties').hide();
                showProperties();
            });
                 
        return false;
    });

    $(document).on('click', '.edit-btn', function(){ 
     
        changePageTitle('Update Property Details');
     
        var property_id = $(this).closest('td').find('.property-id').text();
         
        $('#loader-image').show();
        $('#create-property').hide();
        $('#read-properties').show();
     
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('update_form.php?property_id=' + property_id, function(){
                $('#loader-image').hide(); 
                $('#page-content').fadeIn('slow');
            });
        });
    }); 
    $(document).on('click', '.delete-image-btn', function(){ 
     
        if(confirm('Are you sure you want to delete this photo?')){
         
            var property_image_id = $(this).find('.image-id').text();

             $.ajax({
                url: "deleteImage.php?id=" + property_image_id,
                data:  $(this).serialize(),
                fileName: "myfile",
                success: function(data, response, xhr){
                console.log(data);

                    $('#loader-image').show();
                    showProperties();
                }   
            });

            $.ajax({
                    url: "deleteImage.php?id=" + property_image_id,
                    method: "POST",
                    allowedTypes:"jpg,png,gif,doc,pdf,zip",
                    fileName: "myfile",
                    multiple: true,
                    onSuccess:function(files,data,xhr){
                        console.log("data here  "+data);
                    }
            });


        }
    }); 
    $(document).on('click', '.edit-image-btn', function(){ 
     
        changePageTitle('Change photo');
     
        var property_image_id = $(this).find('.image-id').text();

        console.log("This is image" +property_image_id);
         
         $('#page-content').fadeOut('slow', function(){
                $('#page-content').load('update_image_form.php?property_id=' + property_image_id, function(){
                    $('#loader-image').hide(); 
                    $('#page-content').fadeIn('slow');
                });
         });
    }); 

    $('#loader-image').show();
    showProperties();
     
    $('#read-properties').click(function(){
        $('#loader-image').show();
        $('#create-property').show();
        $('#read-properties').hide()

        showProperties();
    });
     
    function showProperties(){
            
        changePageTitle('List of Properties');
         
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('read.php', function(){
                $('#loader-image').hide(); 
                $('#page-content').fadeIn('slow');
            });
        });
    }

    $(document).on('submit', '#create-property-form', function() {
     
        $('#loader-image').show();

        $.ajax({
            url: "create.php",
            type: "POST",
            data:  $(this).serialize(),
            success: function(data, response, xhr){

                var _data = data.replace(" ", "+");

                            $('#page-content').fadeOut('slow', function(){
                            $('#page-content').load('upload_image_form.php?property_name=' + _data, function(){
                                $('#loader-image').hide(); 
                                $('#page-content').fadeIn('slow');
                            });
                    });

            }   
        });
        return false;

    });
    $('#create-property').click(function(){
        changePageTitle('Property details');
         
        $('#loader-image').show();
        $('#create-property').hide();
        $('#read-properties').show();
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('create_form.php', function(){ 
             
                $('#loader-image').hide(); 
                $('#page-content').fadeIn('slow');
            });
        });
    });
});
</script>
 
</body>
</html>