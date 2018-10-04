<?php
    $player1Hand=array();
    $player2Hand=array();
    
    function makeHand(){
        global $player1Hand;
        global $player2Hand;
        $usedCards = array();
        $cards = array(1,13);
        $hand = array();
        
        for($i = 0; $i<4;$i++){
            do{
                $rand = rand(1,13);
            } while(in_array($rand,$usedCards));
            array_push($usedCards,$rand);   
        }

        shuffle($usedCards);
        for($i=0;$i<4;$i++){
            if($i<=1){
                array_push($player1Hand,$usedCards[$i]);
            } else {
                array_push($player2Hand,$usedCards[$i]);
            }
        }
    }
    
    function displayHand(){
        global $player1Hand;
        global $player2Hand;
        //echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' width ='70'>";
        // echo "<i class='fa fa-car'></i>";
        echo "<div class='hands'>";
            echo "<div id='hand1'>";
            echo "<h1>Player 1<h1>";
            echo "<img src='img/$player1Hand[0].png' alt='$player1Hand[0]' title='".ucfirst($player1Hand[0])."' width ='70'>";
            echo "<img src='img/$player1Hand[1].png' alt='$player1Hand[1]' title='".ucfirst($player1Hand[1])."' width ='70'>";
            echo "</div>";
            echo "<div id='hand2'>";
            echo "<h1>Player 2<h1>";
            echo "<img src='img/$player2Hand[0].png' alt='$player2Hand[0]' title='".ucfirst($player2Hand[0])."' width ='70'>";
            echo "<img src='img/$player2Hand[1].png' alt='$player2Hand[1]' title='".ucfirst($player2Hand[1])."' width ='70'>";
            echo "</div>";
        echo "</div>";
        // echo "<div class='hands'>";
    }
    
    function getWinner(){
        global $player1Hand;
        global $player2Hand;
        $p1;
        $p2;
        for($i = 0; $i<2;$i++){
            $p1 += $player1Hand[$i];
            $p2 += $player2Hand[$i];
        }
        // echo $p1." ";
        // echo $p2. " ";
        $winner;
        if($p1 > 21 && $p2 <=21){
            $winner = "Player 2";
        } else if($p2 > 21 && $p1 <=21){
            $winner = "Player 1";
        } else if ($p1 > 21 && $p2 > 21){
             $winner = "Dealer";
        } else if($p1 == $p2){
            $winner = "Dealer";
        } else if($p1 > $p2){
            $winner = "Player 1";
        } else {
            $winner = "Player 2";
        }
        echo "<h1 id='winner'>The winner is: $winner <h1>";
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        
        <style>@import url("css/styles.css");</style>
        <title>Black Jack</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
            makeHand();
            displayHand();
            getWinner();
        ?>
    </body>
</html>