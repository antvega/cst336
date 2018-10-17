<?php
    function decap($message){
        for($i=0;$i<strlen($message);$i++){
            if($message[$i]>='A'&&$message[$i]<='Z'){
                $message[$i] = chr(ord($message[$i])+32);
            }
        }
        return $message;
    }
    function cap($message){
        for($i=0;$i<strlen($message);$i++){
            if($message[$i]>='a'&&$message[$i]<='z'){
                $message[$i] = chr(ord($message[$i])-32);
            }
        }
        return $message;
    }
    
    function extractLetter($letter,$message){
        $foundLetter = false;
        $finalword = "";
        for($i=0;$i<strlen($message);$i++){
            if($message[$i]==$letter){
                $foundLetter = true;
            } else {
                $finalword.=$message[$i];   
            }
        }

        return $finalword;
    }
    function reverse($message){
        for($i=strlen($message)-1;$i>=0;$i--){
            $finalword.=$message[$i];
        }
        return $finalword;
    }
    
    function checkEverything(){
        $allgood=true;
        if($_GET["message"]==""){
            echo "NEED INPUT!";
            $allgood=false;    
        }
        if($_GET["remove"]==""){
            echo "NEED TO ENTER LETTER!";
            echo "<br>";
            $allgood=false;
        }
        if($_GET["capornot"]!="capitalize" && $_GET["capornot"]!="lower"){
            echo "NEED TO SELECT Capitalize or not!";
            echo "<br>";
            $allgood=false;
        }
        if($_GET["reverse"]!="reverse"){
            echo "NEED TO SELECT REVERSE";
            echo "<br>";
            $allgood=false;
        }
        if($_GET["special"]!="special"){
            echo "NEED TO SELECT REMOVE SPECIAL CHARACTERS";
            echo "<br>";
            $allgood=false;
        }
        return $allgood;
        
    }
    
    function doEverything(){
        //echo "<div class='container'>";
        echo "<div class='item'>";
        // Removes letter from text if letter entered
        $finalword = $_GET["message"];
        // if($finalword==""){
        //     echo "NEED INPUT!";
        //     return;
        // } 
        echo "<div class='finalmessage'>";
        if(!checkEverything()){
            return;
        }
        $copy = $finalword;

        if($_GET["remove"]!=""){
            
            echo "Message with (".$_GET["remove"].") removed: ".extractLetter($_GET["remove"],$_GET["message"]);
            echo "<br>";
            $finalword = extractLetter($_GET["remove"],$_GET["message"]);
        }
        if($_GET["capornot"]=="capitalize"){
            echo "Capitalized: ". cap($_GET["message"]);
            echo "<br>";
            $finalword = cap($finalword);
        } else if ($_GET["capornot"]=="lower") {
            echo "Lowercased: " .decap($_GET["message"]);
            echo "<br>";
            $finalword = decap($finalword);
        } 
        if($_GET["reverse"]=="reverse"){
            echo "Reversed: ".reverse($_GET["message"]);
            echo "<br>";
            $finalword = reverse($finalword);
        } 
        if($_GET["special"]=="special"){
            //*%#$@
            $temp = $_GET["message"];
            $temp = extractLetter("%",$temp);
            $temp = extractLetter("*",$temp);
            $temp = extractLetter("#",$temp);
            $temp = extractLetter("@",$temp);
            $temp = extractLetter("$",$temp);
            echo "Special characters removed: ". $temp;
            $finalword = extractLetter("*",$finalword);
            $finalword = extractLetter("%",$finalword);
            $finalword = extractLetter("#",$finalword);
            $finalword = extractLetter("@",$finalword);
            $finalword = extractLetter("$",$finalword);
            echo "<br>";
        }
        echo "<br>";
        
        echo "Original message: ".$copy;
        echo "<br>";
        echo "Message with commands applied: ".$finalword;
        echo "<br>";
        echo "</div>";
        //require_once('index1.php');
        //echo "</div>";
        require_once('index1.php');
        echo "</div>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3</title>
        <style>@import url("css/styles.css");</style>
    </head>
    <body>
        <div class="container">
            <div class="item">
                <h3 id='entertext'>Enter Text to Manipulate</h3>
                <form method="GET">
                    <textarea name="message" rows="10" cols="30"></textarea></br>
                    Enter letter to remove <input name="remove" type ="text" maxLength="1"></br>
                    Capitalize EVERYTHING<input type="radio" name="capornot" value="capitalize"></br>
                    Lowercase everything<input type="radio" name="capornot" value="lower"></br>
                    Reverse message <input type="checkbox" name="reverse" value="reverse"></br>
                    Remove special characters(*%#$@)<input type="checkbox" name="special" value="special"></br>
                    <input id="sub" type="submit" name="Submit" value="Submit">
                    <br>
                    <?php
                        if($_GET["Submit"]=="Submit"){
                            doEverything();
                        }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html> 