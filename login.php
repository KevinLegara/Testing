<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="libs/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" media="screen" />
</head>
<body>



	<div class="signin-form">

		 <div class="container">
		     <div class="row">
				<div class="col-md-4 col-md-offset-4">
								       <form class="form-signin" method="post" id="login-form">
		      
		        <h2 class="form-signin-heading">Log In to WebApp.</h2><hr />
		        
		        <div id="error">
		        </div>
		        
		        <div class="form-group">
		        <input type="email" class="form-control" placeholder="Email address" name="email" id="user_email" />
		        <span id="check-e"></span>
		        </div>
		        
		        <div class="form-group">
		        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
		        </div>
		       
		      <hr />
		        
		        <div class="form-group">
		            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
		      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
		   </button> 
		        </div>  
		      
		      </form>
				</div>
			</div>
		        
		    </div>
		    
		</div>

	<script src="libs/js/jquery.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="public/js/app.js"></script>
</body>
</html>