<?php
    function displaySymbol($random_value,$pos){
        //$random_value= rand(0,3); Generates a random number from 0 to 2 inclusive
        switch($random_value){
            case 0: $symbol = "seven";
                break;
            case 1: $symbol = "cherry";
                break;
            case 2: $symbol = "lemon";
                break;
            case 3: $symbol = "bar";
                break;
        }
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' width ='70'>";
    }

    function displayPoints($r1,$r2,$r3){
        echo "<div id ='output'>";
        if($r1 == $r2 && $r2 ==$r3){
            switch($r1){
                case 0: $total = 1000;
                        echo "<h1>Jackpot!</h1>";
                        break;
                case 1: $total = 500;
                        break;
                case 2: $total = 250;
                        break;
                case 3: $total = 900;
                        break;
            }
            echo "<h2>You won $total points!</h2>";
        } else {
            echo "<h3> Try Again!<h3>";
        }
        echo "<div>";
    }
    
    
    function play(){
        for($i=1; $i<4;$i++){
            ${"rv" . $i } = rand(0,3);
            displaySymbol(${ "rv" . $i },$i);
        }
        displayPoints($rv1,$rv2,$rv3);
    }
?>