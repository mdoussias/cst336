<!--
Mac Doussias
CST 336 CSUMB
LAB2

 <img src="img/cherry.png" alt="cherry.png" title="Cherry" width="70" />
-->


<?php 
    include 'inc/functions.php'
?>


<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
    <body>
            <div id="main">

            <?php
                play();
            ?>
        
            <form>
	            <input type="submit" value="Spin!"/>
            </form>        
        </div>
    </body>
</html>