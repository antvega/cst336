<?php
include 'inc/functions.php';
  function displayCategories() {
    $categories = ['titles', 'genres','ratings'];
    foreach ($categories as $c) {
      echo "<option value='" . $c ."'>" . ucfirst($c) ."</option>";
    }
  }
  
  function displayResults(){
    if(isset($_POST['submit'])) {
        echo "<h1>Movies Found</h2>";
        echo "<br>";
        $movies = getResults();
        
        foreach($movies as $movie){
          $photo = getPhoto($movie['title']);
          echo "<table>";
          echo "<tr>";
          echo "<td><img src='img/".$photo['posters']."'>";
          echo "</td>";
          echo "<td>";
          echo "<h3>Title: ".$movie['title']."</h3>";
          echo "<h5>Genre: ".$movie['type']."</h5>";
          echo "<h5>".$movie['runtime']." minutes</h5>";
          echo "<h5>Rating: ".$movie['rating']."</h5>";
          echo "</td>";
          echo "</table>";
            
            // echo "<img src='img/".$photo['posters']."'>";
            //echo "<h5>".$movie['posters']."</h5>";
        }

    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Main Page </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <script>
        
        </script>
    </head>
    <body>
        <?php
	        include 'inc/header.php';
        ?>
        <br>
        
        <!--<h1> Movie Finder </h1>-->
      <form method="post">
        Title: <input type="text" name="title"><br>
        
        Sort by: <select name="genreSort">
          <option value=""> Select one </option>
          <?=displayCategories()?>
        </select><br>
        <input type="radio" name="order" value="asc"> Ascending <br>
        <input type="radio" name="order" value="desc"> Descending <br>
        
        <br><input class="btn btn-default" type="submit" name ="submit" value="Search">
      </form>
        
        <?php
           displayResults();
        ?>
        
    </body>
</html>