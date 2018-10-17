<?php

    function displayYears($startYear,$endYear){
        $sum = 0;
        // 
        $zodiaSigns = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog");
        for($i=$startYear;$i<=$endYear;$i++){
            $sum+=$i;
            echo "<li>" .$i ."<br>";
            echo "<img src='img/".$zodiaSigns[($i+8)%12].".png'>";
            // if($i==1776) echo " American Independence Day";
            // else if($i%100==0) echo " Happy New Century";
            echo "</li>";
        }
        return $sum;
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Zodiac Years</h1>
        <form>
            Start Year <input type="number" name="start"><br>
            End Year <input type="number" name="end"><br>
            <input type="submit" value="submit">
        </form>
        <ul>
            <?php echo "<h1>Your Total: ".displayYears($_GET["start"],$_GET["end"]);"<h1>" ?>
        </ul>
    </body>
</html>
