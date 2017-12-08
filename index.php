<?php
    include('config.php');
    if(isset($_POST['login'])){
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $username = test_input($_POST["username"]);
        $password = md5(test_input($_POST["password"]));
        
        
        $sql="SELECT * FROM users WHERE username ='$username' and password ='$password'";
        $stmt=$pdo->query($sql);

        if($stmt->rowCount()>0){
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
          session_start();
          $_SESSION['username']=$row['username'];
          $_SESSION['userid']=$row['id'];
          $_SESSION['fname']=$row['firstname'];
          $_SESSION['lname']= $row['lastname']; 
          
          echo "<script src='/scripts/calldashboard.js' type='text/javascript'></script>";
        }
        
        else{
            echo "<script>alert('Your password and email address combinations does not match our records')</script>";
        }
    }
    
    if($_SESSION['userid']===null){
        echo "<script src='/scripts/login.js' type='text/javascript'></script>";
    }
?>






  
