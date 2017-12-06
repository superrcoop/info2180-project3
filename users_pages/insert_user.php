<?php

	include('../config.php');
	session_start();
	 if($_SESSION['username']===null){
        echo header('location:index.php');
    }

	// prepare sql and bund parameters
	$sql = $pdo->prepare("INSERT INTO users (firstname,lastname,username,password) 
	VALUES(:firstname,:lastname,:username,:password)");
	$sql->bindParam(':firstname',$firstname);
	$sql->bindParam(':lastname',$lastname);
	$sql->bindParam(':username',$username);
	$sql->bindParam(':password',$password);
	
	//insert data
	$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
	$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$password = md5($_POST['password']);
	
	$sql->execute();
	$response= "New User created successsfully";

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/css/add_user.css">
		<script src="/scripts/adduser.js" type="text/javascript"></script>
	</head>
	<body>
		<h1><?php echo $response?></h1>
		<table class="table">
			<thead>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
			</thead>
			</tbody>
				<td><?php echo $username ?></td>
				<td><?php echo $firstname ?></td>
				<td><?php echo $lastname ?></td>
			</tbody>
		</table>
		<a href="" onclick="backtomessages()">Back to Messages</a>
		<a href="" onclick="logout()">Logout</a>
	</body>
</html>