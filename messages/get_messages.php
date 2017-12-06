<?php
	session_start();
	include('../config.php');
	$userid=$_SESSION['userid'];
	$stmt = $pdo->query("SELECT concat(firstname,' ',lastname) as sendername, messages.id, subject, body, LEFT(body,30) as preview, IF(messages_read.date_read is NULL,'bold','text') as mread, date_sent, messages_read.reader_id,messages_read.date_read from messages left join messages_read on messages.id=message_id left join users on users.id=sender_id where recipient_ids like '%$userid%' order by date_sent desc LIMIT 10");
	$count=0;
	$doc= "<table class='table'>";
	$doc.="<thead>
			<th>SENDER</th>
			<th>MESSAGES</th>
			<th>DATE</th>
		</thead><tbody>";
	$class='';
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$read=$row['mread'];
		if($count%2==0){
			$class='"even '.$read.'"';
		}
		else{
			$class='"odd '.$read.'"';
		}
		$type="'inbox'";
		$function='"readupdate('.$row['id'].',this,'.$type.')"';
		$doc.= "<tr class=".$class." onclick=".$function."><td>".$row['sendername']."</td><td>".$row['subject'].'- '.$row['preview']."</td><td>".date_format(date_create($row['date_sent']),'M-d-y')."</td>";
		$count++;
	}
	$doc.='</tbody></table>';
	echo $doc;
?>