<?php

session_start();
include('../config.php');
$recipients=filter_var($_POST['recipients'], FILTER_SANITIZE_STRING);
$subject=filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$body=filter_var($_POST['body'], FILTER_SANITIZE_STRING);
$senderid=$_SESSION['userid'];

$good='';
$contacts=explode(',',$recipients);
$bad=[];

    $stmt=$pdo->prepare("Select * from users where username=:user LIMIT 1");
    $stmt->bindParam(":user",$user);
    $id='';
    
for($m=0;$m<count($contacts);$m++){
    $user=$contacts[$m];
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $id=$row['id'];
    }
    
    if($good==='' && $id!==''){
        $good=$id;
        $id='';
    }
    if($id===''){
        array_push($bad,$contacts[$m]);
    }
    if($good!=='' && $id!==''){
        $good.=','.$id;
        $id='';
    }
}    

$now=date("Y-m-d h:m:s");
$date=$now;
$stmt2=$pdo->query("INSERT messages (recipient_ids,subject,body,sender_id,date_sent) VALUES ('$good','$subject','$body','$senderid','$date')");

if($stmt2->rowCount()>0){
    $message="Your message has been sent";
    if(count($bad)>0){
        $message.="The following contacts were not found";
        foreach($bad as $notfound){
            $message.= $notfound.'<br/>';
        } 
    }
    echo $message;
}
?>
