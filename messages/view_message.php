<?php
	session_start();
	include('../config.php');
	$messageid=$_POST['message_id'];
	$type=(string)$_POST['type'];
	$stmt = $pdo->query("SELECT recipient_ids,sender_id, subject, body, date_sent from messages where id=".$messageid." order by date_sent");
	$users = $pdo->query("SELECT * from users");
	$userinfo =[];
	while($row2=$users->fetch(PDO::FETCH_ASSOC)){
		$userinfo[$row2['id']]=$row2['firstname'].' '.$row2['lastname'];
	}
	$doc='';
	$class='';
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$class="innertext";
		$recipients='';
		$receivers=explode(',',$row['recipient_ids']);
		foreach ($receivers as $value){
    		$recipients.=$userinfo[$value].", ";
    		
		}
		$sender=$userinfo[$row['sender_id']];
		
		switch ($type) {
		    case "inbox":
		        $doc.="<h3>SENT BY: ".$sender."</h3>";;
		        break;
		    case "outbox":
		        $doc.="<h3>RECIPIENTS: ".$recipients."</h3>";
		        break;
		}
		
		$doc.="<h3>SUBJECT: ".$row['subject']."</h3>".
		"<h3>DATE: ".date_format(date_create($row['date_sent']),'M-d-y')."</h3>";
		$doc.= "<p class=".$class.">".$row['body']."</p>";
	}
	echo $doc;
?>