<?php

session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST["username"]);
  $password = md5(test_input($_POST["password"]));
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo $username;;
echo $password;

$sql="SELECT * FROM users WHERE username ='$username' and password ='$password'";
$stmt=$pdo->query($sql);
if($stmt->rowCount()>0){
    echo "success";
}
else{
    echo "failure";
}

?>
