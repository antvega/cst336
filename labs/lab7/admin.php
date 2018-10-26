<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
    </head>
    <body>
        
        <h1> ADMIN SECTION - OTTERMART </h1>
        
         <h3>Welcome <?= $_SESSION['adminFullName'] ?> </h3>

    </body>
</html>