<html>
    <?php
        session_start();
         if($_SESSION['username']===null){
            echo header('location:/index.php');
         }
    ?>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/add_user.css">
        <script src="/scripts/adduser.js" type="text/javascript"></script>
    </head>
    <body>
        <p class="heading">Add New User</br>Enter Details Below</p>
        <section id="main">
            <form id="newuser" method="POST" >
                <label class="label">Firstname:</label></br>
                </br>
                <input id="fname" class="input" type="text" name="firstname" value="" required/></br></br>
                <label class="label">Lastname:</label></br>
                </br>
                <input id="lname" class="input" type="text" name="lastname" value="" required/></br></br>
                <label class="label">Username:</label></br>
                </br>
                <input id="uname" class="input" type="text" name="username" value="" required/></br></br>
                <label class="label">Password:</label></br>
                </br>
                <input id="passw" class="input" type="password" name="password" value="" required/></br></br>
                <input id="addbutton" class="button" name="adduser" type="button" onclick="testform()" value="ADD USER"/>
            </form>
        </section>
    </body>
</html>