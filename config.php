<?php
	$servername = getenv('IP');
	$username = getenv('C9_USER');
	$password = "";
    $database = "c9";
    $dbport = 3306;

	try {
    	$pdo = new PDO('mysql: host='.$servername.'; port='.$dbport.'; dbname='.$database, $username, $password);
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
	catch(PDOException $e)
    	{
    	echo "Connection failed: " . $e->getMessage();
    }
?>