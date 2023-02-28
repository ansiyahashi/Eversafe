<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
   header('Location: loggin.php');
}

?>
<!doctype html>
<html>
    <head></head>
    <body>
        <h1>Homepage</h1>
        <br>
        <a href="loggout.php">Logout</a>
    </body>
</html>