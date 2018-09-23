<?php
    function displayArray($symbols){
        for($i = 0;$i<count($symbols);$i++){
            echo $symbols[$i];
            echo "<br>";
        }
    }
    $symbols = array("seven");
    array_push($symbols,"orange","grapes","cherry");
    
    $points = array("orange"=>250,"cherry"=>500,"grapes"=>750,"seven"=>1000);
    //print_r($symbols);// displays content
    // displayArray($symbols);
    echo "<br>";
    // sort($symbols);
    // the period "." is used to concatinate text with php code
    //echo "Random Value: " . $symbols[rand(0,count($symbols) - 1)];
    $indexes = array();
    for($i = 0; $i <3;$i++){
        $indexes[] =$symbols[array_rand($symbols)];
        echo "<img src='../lab2/img/" . $indexes[$i] .".png'>";    
    }
    
    if($indexes[0] == $indexes[1] && $indexes[1] ==$indexes[2]){
        echo "Congrats! You won: " . $points[ $symbols[ $indexes[0] ] ];
    }
    // unset() removes element from array using index
    // unset($symbols[0]); this doesnt shift values over
    // $symbols = array_values($symbols); //this re-indexes elements in array
    // displayArray($symbols);
?>

<!DOCTYPE>
<html>
    <head>
        <title>Array Review</title>
    </head>
</html>