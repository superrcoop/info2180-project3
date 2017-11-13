<?php

session_start();
include('../config.php');
$recipients=$_POST['recipients'];
$subject=$_POST['subject'];
$body=$_POST['body'];
$senderid=$_SESSION['userid'];


function insert_message($recipients,$subject,$body,$senderid){
	//Insert Sql code to add messages to table
	//test if the data has been inserted the echo the statement below
	echo "Your message has been sent";
}

insert_message($recipients,$subject,$body,$senderid);
?>
