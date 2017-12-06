<?php 
    session_start();
    if($_SESSION['username']===null){
        echo header('location:index.php');
    }
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/dashboard.css"> 
        <script src="scripts/dashboard.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <h1 id="greetings">Cheapo Mail
                </br>Good day
                <?php print $_SESSION['fname'].' '.$_SESSION['lname']?>
            </h1>
            <h2 id="username" value="<?php print $_SESSION['username']?>"><?php print $_SESSION['username']?></h2>
            <input id="logout" class="button" value="LOGOUT" onclick="logout()"/>
        </header>
        <aside>
            <input id="compose" class="button" value="COMPOSE"/> 
            <p id="adduser" class="options" onclick="adduserpage()">Add User</p>
            <p id="inbox" class="options" onclick="showinbox()">Inbox</p>
            <p id="outbox" class="options" onclick="showoutbox()">Outbox</p>
        </aside>
        <section id="messages">
        </section>
        <section id="outmessages">
        </section>
        <section id="currmessage">
        </section>
    </body>
</html>