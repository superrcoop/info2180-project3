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
            <p id="inbox" class="options" onclick="showinbox()">Inbox</p>
            <p id="outbox" class="options" onclick="showoutbox()">Outbox</p>
            <?php 
                //if($_SESSION['username']=='admin'){
                  //  echo "<a class='options' href='add_user.html'>Add User</a>";
               // }
            ?>   
        </aside>
        <section id="messages">
        </section>
        <section id="outmessages">
        </section>
        <section id="currmessage">
        </section>
    </body>
</html>