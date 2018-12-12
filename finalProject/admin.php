<?php
session_start();

include 'inc/functions.php';
validateSession();
?>
<?php
include 'inc/header.php';
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
        
            function confirmDelete() {
                //alert();
                //prompt();
                return confirm("Really?");
                
            }
  
            
            function avg(){
    	              $.ajax({
                        type: "GET",
                        url: "avgTime.php",
                        success: function(data) {
                            $("#avgtime").html(data);
                        },
    	           //   alert($(this).attr('id'));
    	          }); // petlink click
            }  
            function max(){
    	              $.ajax({
                        type: "GET",
                        url: "maxTime.php",
                        success: function(data) {
                            $("#maxtime").html(data);
                        },
    	           //   alert($(this).attr('id'));
    	          }); // petlink click
            } 
            function min(){
    	              $.ajax({
                        type: "GET",
                        url: "minTime.php",
                        success: function(data) {
                            $("#mintime").html(data);
                        },
    	           //   alert($(this).attr('id'));
    	          }); // petlink click
            }
            $('document').ready(avg); // doc end
            $('document').ready(max); // doc end
            $('document').ready(min); // doc end
        </script>
    
    </head>
    <body>
        <center>
         <h3>Welcome</h3>
        
          <form action="addMovie.php">
              <input type="submit" value="Add New Movie">
          </form>
          <h6>Runtime Data</h6>
          
            <button onclick="avg();">Average</button>
           <span id='avgtime'></span>
           <!--<br>-->
           <!--<br>-->
            <button onclick="max();">Max</button>
           <span id='maxtime'></span>
           <!--<br>-->
           <!--<br>-->
            <button onclick="min();">Min</button>
           <span id='mintime'></span>
           <br>    
           <br>
        </center>
        <div style='padding-left: 500px;'>
            <?= displayAllMovies() ?>    
        </div>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </body>
</html>