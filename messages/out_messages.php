<?php
	session_start();
	include('../config.php');
	$userid=2;
	$stmt = $pdo->query("SELECT messages.id,recipient_ids, subject, body, LEFT(body,30) as preview, date_sent from messages where sender_id=".$userid." order by date_sent");
	$users = $pdo->query("SELECT * from users");
	$userinfo =[];
	while($type=$users->fetch(PDO::FETCH_ASSOC)){
		$userinfo[$type["id"]]=$type['firstname'].' '.$type['lastname'];

	}
	$count=0;
	$doc= "<table class='table'>";
	$doc.="<thead>
			<th>RECIPIENTS</th>
			<th>MESSAGES</th>
			<th>DATE</th>
		</thead><tbody>";
	$class='';
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$recipients='';
		$receivers=explode(',',$row['recipient_ids']);
		foreach ($receivers as $value){
    		$recipients.=$userinfo[$value]." ";
		}
		if($count%2==0){
			$class="even";
		}
		else{
			$class="odd";
		}
		$function='viewMessage('.$row['id'].',"outbox")';
		$doc.= "<tr class=".$class." onclick=".$function."><td>".substr($recipients,0,10).',...'."</td><td>".$row['subject'].'- '.$row['preview']."</td><td>".date_format(date_create($row['date_sent']),'M-d-y')."</td>";
		$count++;
	}
	$doc.='</tbody></table>';
	echo $doc;
?>