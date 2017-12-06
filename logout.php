<?php
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_destroy();
        echo "<script>alert('You have logged out. Please login again to continue')</script>";
        echo "<script src='/scripts/login.js' type='text/javascript'></script>";
    }
?>