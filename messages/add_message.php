<?php

session_start();
include('../config.php');
$recipients=$_POST['recipients'];
$subject=$_POST['subject'];
$body=$_POST['body'];
$senderid=$_SESSION['userid'];

$now=date("Y-m-d h:m:s");
$date=$now;
$stmt2=$pdo->query("INSERT messages (recipient_ids,subject,body,sender_id,date_sent) VALUES ('$recipients','$subject','$body','$senderid','$date')");

if($stmt2->rowCount()>0){
 echo "Your message has been sent";   
}
?>
