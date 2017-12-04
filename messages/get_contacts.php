<?php
	session_start();
	include('../config.php');
	$users = $pdo->query("SELECT * from users");
	$userinfo =[];
	while($row2=$users->fetch(PDO::FETCH_ASSOC)){
		$userinfo[$row2['id']]['name']=$row2['firstname'].' '.$row2['lastname'];
		$userinfo[$row2['id']]['username']=$row2['username'];
	}
	echo json_encode($userinfo);
?>