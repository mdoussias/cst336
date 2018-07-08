<!--
Mac Doussias
CST 336 Homework 2 CSUMB
-->

<?php 
    include 'inc/functions.php'
?>


<!DOCTYPE HTML>
<html>
	
  	
	
  <head>
        <style>
            @import url("css/style.css");
        </style>
        <meta charset="utf-8">
        <title>Random Binary</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <header>
        	<img class="binaryImg" src="img/orangeBinary.png" alt="binary code" /><br /> 
			<h1>RANDOM BINARY NUMBER GENERATOR</h1>
		</header>
		
		<main>
				<div>
					<img class="binaryImg" src="img/binary.png" alt="binary Image" />
					<p class="imageClass">This image was retrieved 07-07-18 from:</p> 
					<a class="imageClass" href="https://pixabay.com/en/binary-code-binary-binary-system-475664/">https://pixabay.com/en/binary-code-binary-binary-system-475664/</a>
					<p id="mainText">
					This website generates a random number.
					<br/>Then it converts that number to <span id="capsSpan">binary</span> and displays it.
					</p>
				</div>
				
		</main>
        <form>
	    	<input type="submit" value="CLICK HERE TO: Generate a Random Binary Number"/>
        </form> 
        <br/><br/>

		<?php
			play();
		?>
		
		<br/><br/><br/>
        <footer>
            <hr>
			<img src="img/logo.png" alt="CSUMB Logo" /><br />
			CSUMB CST 336 2018&copy; Doussias <br />
			<span id="disclaimerText"><strong>Disclaimer:</strong> The information in this webpage is fictitious. <br />
			It is used for academic purposes only.</span>
		
		</footer>
        
    </body>


</html>