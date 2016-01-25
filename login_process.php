<?php  
	session_start();

	include_once 'config/database.php';
	include_once 'repository/User.php';

	$database = new Database();
	$db = $database->getConnection();
	 
	$user = new User($db);
	$user->email = trim($_POST['email']);
	$user->password = trim($_POST['password']);

	try{
		$count = $user->checkUser()->rowCount();
		$row = $user->checkUser()->fetch(PDO::FETCH_ASSOC) ;
		if($row['password'] == $user->password){
			echo 'ok';
    		$_SESSION['user_session'] = $row['name'];
		}else{
			echo "email or password does not exist.";
		}

	}catch(PDOException $e){
		echo $e->getMessage();
	}