<?php
	session_start();
	include('../config.php');
	//$userid=$_SESSION['userid'];
	$userid=2;
	$messageid=$_POST['messageid'];
	$date=date('Y-m-d h:i:s');
	
	$stmt2=$pdo->query("INSERT messages_read (`message_id`, `reader_id`, `date_read`) VALUES ('$messageid','$userid','$date')");

?>
