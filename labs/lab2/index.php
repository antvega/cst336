<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body> 
        <?php
        
            function displayPoints($r1,$r2,$r3){
                switch(){
                    case 0:
                }
                // if($r1==$r2&&$r1==$r3){
                    
                // }
                echo $user_score;
            }
            function displaySymbol($random_value){
                //$random_value= rand(0,3); Generates a random number from 0 to 2 inclusive
                switch($random_value){
                    case 0: $symbol = "seven";
                        break;
                    case 1: $symbol = "cherry";
                        break;
                    case 2: $symbol = "lemon";
                        break;
                }
                echo "<img src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."'>";
                return $symbol;
            }
            $random_value1 = rand(0,2);
            $random_value2 = rand(0,2);
            $random_value3 = rand(0,2);
            displaySymbol($random_value1);
            displaySymbol($random_value2);
            displaySymbol($random_value3);
            
        ?>

    </body>
</html>