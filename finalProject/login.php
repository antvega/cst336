<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("finalProject");


function validate(){
    global $dbConn;
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM login
                     WHERE username = :username 
                     AND  password = :password ";                 
    $np = array();
    $np[':username'] = $username;
    $np[':password'] = $password;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);
    if (empty($record)) {
        return false;
    } else {
        //echo "<h1>Logged in</h1>";
        
        $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
        header('Location: index.php'); //redirects to another program
        return true;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <script>
            function ah(){
                alert("Wrong username or password");
            }
        </script>
    </head>
    <body>
        <?php
            include 'inc/header.php';
        ?>
        
        <form method="post">
          Username:  <input type="text" name="username"/> <br>
          Password:  <input type="password" name="password"/> <br>
          <input type="submit" value="Login" name="Login">
           <?php
              if($_POST['Login']=="Login"){
                  if(!validate()){
                    echo "<script>ah();</script>";
                  }
              }
           ?>
        </form>

    </body>
</html>