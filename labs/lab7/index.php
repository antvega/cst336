<?php
include 'loginProcess.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css"/>
        
        <script>
            function ah(){
                alert("Wrong username or password");
            }
        </script>
    </head>
    <body>

        <h1> Ottermart - Admin Login </h1>
        
        <form method="post">
          Username:  <input type="text" name="username"/> <br>
          Password:  <input type="password" name="password"/> <br>
          <input type="submit" value="Login" name="Login">
           <?php
              if($_POST['Login']=="Login"){
                  if(!validate()){
                    echo "<script>ah()</script>";
                  }
              }
           ?>
        </form>

    </body>
</html>