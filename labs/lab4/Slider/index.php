<?php

$backgroundImage = "img/sea.jpg";

// if (isset($_GET["keyword"])) 
if(!empty($_GET["keyword"]) || !empty($_GET["category"])){  
    include "api/pixabayAPI.php";
    $keyword = $_GET["keyword"];
    if (!empty($_GET['category'])) { 
        $keyword = $_GET['category'];
    }
    echo "<text class='radioBtns'>You searched for:  $keyword</text>";
    $imageURLs = getImageURLs($keyword, $_GET["layout"]);
    shuffle($imageURLs);
    $backgroundImage = $imageURLs[array_rand($imageURLs)];
} 

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Pixabay Slideshow </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        
        <style>
            
            body {
                
                background-image: url(<?=$backgroundImage?>);
                background-size: cover;
                
            }
            
            #carouselExampleIndicators{
                 width:500px;
                 margin:0 auto; 
            }
        
        </style>
    </head>
    <body>
    
        <br>

        <form method="GET">

            <input class="submit" type="text" name="keyword" size="15" placeholder="Keyword"/>
            
            <div id="layoutID">
                <input type="radio" name="layout" value="horizontal"  
                    <?= ($_GET['layout'] == "horizontal")?" checked":"" ?>  > <text class="radioBtns"> Horizontal</text>
                    <br>
                <input type="radio" name="layout" value="vertical"  
                    <?= ($_GET['layout'] == "vertical")?" checked":"" ?>  > <text class="radioBtns"> Vertical</text>
            </div>
            <br>

            <select name="category">
                <option value=""> Categories </option>
                <option value="ocean">Sea</option>
                <option>Mountains</option>
                <option>Forest</option>
                <option>Sky</option>
            </select>
            <input class="submit" type="submit" name="submitBtn" value="Submit!!"/>
        </form>
        <?php 
        if (isset($imageURLs)) { ?>
           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php
                  for ($i=1; $i < 7; $i++) { 
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                  }
                 ?>
              </ol>
              <div class="carousel-inner">
                <?php
                  for ($i = 0; $i < 7; $i++) {
                      echo "<div class=\"carousel-item ";
                      echo ($i == 0)?" active ":"";
                      echo "\">";
                      echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$i]."\" alt=\"Second slide\">";
                      echo "</div>";
                  }
                 ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        <?php
         }
         else {
            echo "<br><h1>Enter a Keyword or Select a Category!</h1>";     
         }
        ?>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       
    </body>
</html>