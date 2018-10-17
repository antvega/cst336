<?php
    function radios(){
        if($_GET["capornot"]=="capitalize"){
            echo "Capitalize EVERYTHING<input type='radio' name='capornot' value='capitalize' checked='checked'></br>";
            echo "Lowercase everything<input type='radio' name='capornot' value='lower'></br>";
        } else {
            echo "Capitalize EVERYTHING<input type='radio' name='capornot' value='capitalize'></br>";
            echo "Lowercase everything<input type='radio' name='capornot' value='lower' checked='checked'></br>";        
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3</title>
    </head>
    <body>
        <!--<h3>Enter Text to Manipulate</h3>-->
        <br>
        <br>
        <div class="item2">
            <h4>Your Input</h4>
            <form method="GET">
                <textarea name="message" rows="10" cols="30"><?php echo $_GET["message"]?></textarea></br>
                Enter letter to remove <input name="remove" type ="text" maxLength="1" value="<?php echo $_GET['remove']?>"></br>
                <?php radios() ?>
                Reverse message <input type="checkbox" name="reverse" value="reverse" checked="checked"></br>
                Remove special characters(*%#$@)<input type="checkbox" name="special" checked="checked"></br>
                <br>
            </form>
        </div>
    </body>
</html> 