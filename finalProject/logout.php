<?php
session_start();
include 'inc/functions.php';
validateSession();
?>
<?php
include 'inc/header.php';
?>

<?php
function logoutNow(){
    session_destroy();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            form {
                display: inline-block;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <script>
            
        </script>
    
    </head>
    <body>
        
        <h1> Are you sure you want to logout? </h1>
         <form>
              <input type="submit" name='submit'value="Logout">
          </form>
          
          <?php
            if($_GET['submit']=="Logout"){
                logoutNow();
            }
          ?>
    </body>
</html>