<?php 
    //session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
        <script src="scripts/dashboard.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <h1>Cheapo Mail
                </br>Good day
                <?php 
                   // echo $_SESSION['fname'].' '.$_SESSION['lname'];
                ?>
            </h1>
            <input id="logout" class="button" value="LOGOUT"/>
        </header>
        <aside>
            <input id="compose" class="button" value="COMPOSE"/> 
            <p class="options" onclick="getMessages()">Inbox</p>
            <p class="options" onclick="">Outbox</p>
            <?php 
                //if($_SESSION['username']=='admin'){
                  //  echo "<a class='options' href='add_user.html'>Add User</a>";
               // }
            ?>   
        </aside>
        <section id="messages">
            
        </section>
    </body>
</html>