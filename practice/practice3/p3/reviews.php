<?php

include 'inc/charts.php';
$posters = array("ready_player_one","rampage","paddington_2","hereditary","alpha","black_panther","christopher_robin","coco","dunkirk","first_man");
$picked = array();
$totalRatings = array();

function movieReviews() {
    global $posters;
    global $picked;
    global $totalRatings;
    
    $randomPoster;
    do {
        $randomPoster = $posters[rand(0,count($posters)-1)];    
    } while(in_array($randomPoster,$picked));
    array_push($picked,$randomPoster);
    $posterTitle = ucwords(str_replace('_',' ',$randomPoster));
    echo "<div class='poster'>";
    echo "<h2> $posterTitle </h2>";
    echo "<img width='100' src='img/posters/$randomPoster.jpg'>";    
    echo "<br>";
    
    //NOTE: $totalReviews must be a random number between 100 and 300
    
    $totalReviews = rand(100,300); 
    
    //NOTE: $ratings is an array of 1-star, 2-star, 3-star, and 4-star rating percentages
    //      The sum of rating percentages MUST be 100
    $r1 = rand(0,30);
    $r2 = rand(0,30);
    $r3 = rand(0,30);
    $r4 = 100 - ($r1 + $r2 + $r3);
    $ratings = array($r1,$r2,$r3,$r4);
    
    //NOTE: displayRatings() displays the ratings bar chart and
    //      returns the overall average rating
    $overallRating = displayRatings($totalReviews,$ratings);
    // array_push($totalRatings,$overallRating);
    $totalRatings[$randomPoster] = $overallRating;
    
    //NOTE: The number of stars should be the rounded value of $overallRating
    echo "<br>";
    for($i=0; $i<round($overallRating); $i++) {
        echo "<img src='img/star.png' width='25'>";
    }
    // echo "<img src='img/star.png' width='25'>";
    
    echo "<br>Total reviews: $totalReviews";
    echo "</div>";
}    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Movie Reviews </title>
        <style type="text/css">
            body {
                background: linear-gradient(#80808060, #80808060), url('./img/bg.jpg');
                color: #fff;
                text-align:center;
            }
            #main {
                display:flex;
                justify-content: center;
            }
            .poster {
                padding: 0 10px;
            }
        </style>
    </head>
    <body>
       
       <h1> Movie Reviews </h1>
        <div id="main">
           <?php
             //NOTE: Add for loop to display 4 movie reviews
             for($i=0;$i<4;$i++){
                movieReviews();
             }
           ?>
       </div>
       <br/>
       <hr>
       <h1>Based on ratings you should watch:</h1>
       <?php
        $maxVal = max($totalRatings);
        $key = array_search($maxVal, $totalRatings);
        $title = ucwords(str_replace('_',' ',$key));
        echo "<div class='poster'>";
        echo "<h2> $title </h2>";
        echo "<img width='100' src='img/posters/$key.jpg'>";    
        echo "<br>";
       ?>
       
    </body>
</html>