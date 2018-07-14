<!--
Mac Doussias
CST 336 Homework 3 CSUMB
-->

<?php 
   //include 'inc/functions.php'
   
   //assign variable from form data on previous page
	if(isset($_POST['firstName'])){
		$firstName = $_POST['firstName'];				
	}else{
		$firstName = "";
	}
	
	   //assign variable from form data on previous page
	if(isset($_POST['lastName'])){
		$lastName = $_POST['lastName'];				
	}else{
		$lastName = "";
	}
	
	 //assign variable from form data on previous page
	if(isset($_POST['ccNumber'])){
		$ccNumber = $_POST['ccNumber'];			
		$ccNumberErrorBool = false;

		//The following if statements are all to check if the credit card number was input properly
		if(strlen($ccNumber) != 19 and $ccNumber != ""){ //Check if correct character length
			$ccNumberErrorBool = true;
		} else{ //The string is the proper amount of characters
			for($i = 0; $i < strlen($ccNumber); $i++){
				$character = $ccNumber[$i];
				if($character == '-'){ //Check if the string is a dash
					if($i != 4 and $i != 9 and $i != 14){//check if the dash is in the correct place
						$ccNumberErrorBool = true;  //This will trigger an error message later in the program
						break;
					}
				}else{
					if(!IS_NUMERIC($character)){ //True if character represents anything other than a number
						$ccNumberErrorBool = true; //This will trigger an error message later in the program
						break;					
					}
				}
			}	
		}
	
	}else{
		$ccNumber = "";
	}	
	
	   //assign variable from form data on previous page
	if(isset($_POST['creditCard'])){
		$creditCard = $_POST['creditCard'];				
	}else{
		$creditCard = "";	
	}	
	
		   //assign variable from form data on previous page
	if(isset($_POST['ticketChoice'])){
		$ticketChoice = $_POST['ticketChoice'];				
	}else{
		$ticketChoice = "";	
	}
	
			   //assign variable from form data on previous page
	if(isset($_POST['numTickets'])){
		if($_POST['numTickets'] == '1'){
			$numTickets = 1;
		}elseif($_POST['numTickets'] == '2'){
			$numTickets = 2;			
		}elseif($_POST['numTickets'] == '3'){
			$numTickets = 3;			
		}elseif($_POST['numTickets'] == '4'){
			$numTickets = 4;			
		}		
		$numTickets = $_POST['numTickets'];				
	}else{
		$numTickets = "";	
	}
	
	
	if(isset($_POST['donation'])){
		$donation = 2.00;
	}else{
		$donation = 0.00;
	}
	
	
	
	
	
	//Check to see if all form data was input properly
	if(isset($_POST['submitButton'])){
		if($firstName == "" or $lastName == "" or $ccNumber =="" or $creditCard == "" or $ticketChoice == "" or $numTickets == "" ){
			$requiredFieldErrorBool = true;
		}
	}
	
	
	
	
	//Declare a general error message 
	$requiredFieldErrorMsg = "<span class='errorMsg'>*Required field!</span>";
	if(!isset($_POST['submitButton'])){
		$requiredFieldErrorMsg = ""; //Because the form hasn't been submitted yet, this should be empty
	}
	
	//Make a variable for an error message for the credit card number, only if it is needed.  Otherwise, give the variable a blank value.
	if($ccNumberErrorBool){
		$ccNumberErrorMsg = "<span class='errorMsg'>* Use format 'XXXX-XXXX-XXXX-XXXX'</span>"; 
	}else{
		$ccNumberErrorMsg = "";	
	}
	
?>

<!DOCTYPE HTML>
<html>
	
  <head>
        <style>
            @import url("css/style.css");
        </style>
        <meta charset="utf-8">
        <title>Big Ballet Tickets</title>

    </head>
    <body>
        <header>
			<h1>Ballet Tickets</h1>
		</header>
    <div id="mainDiv">
        <img class="image" src="img/ballet.png" alt="Ballet Image Of Pas De Deux" />
        <h2>The Big Ballet Company Presents:</h2>
        <p id="galaText">A gala evening to remember!</p><br/>
        <ul style="list-style-type:disc">
          <li>Agon - <span class="nameText">George Balanchine</span></li>
          <li>Grande Pas Classique - <span class="nameText">Victor Gsovsky</span></li>
          <li>In The Glow Of the Night - <span class="nameText">Goh Choo San</li>
        </ul>  
        <br /><br />
        <?php 
			if(!isset($_POST['submitButton'])){ //The form has not been submitted
				echo "<h3>ALL TICKETS ARE $ 25.00</h3>";
			}elseif($requiredFieldErrorBool or $ccNumberErrorBool){ //the form was submitted with errors
				echo "<p class='errorMsg'>ERROR! THERE WAS A PROBLEM WITH YOUR TRANSACTION.<br>PLEASE ENSURE ALL DATA WAS ENTERED PROPERLY!</p>
				<br /><br /><h3>ALL TICKETS ARE $ 25.00</h3>";
			}else{//The form was submitted properly
				echo "<hr><p id='receiptHeaderText'>RECEIPT</p>";
				echo "Thank you for your purchase <b>".$firstName." ".$lastName."</b>!<br /><br />";
				//Get the last four digits of credit card
				$lastFourDigits = $ccNumber[15].$ccNumber[16].$ccNumber[17].$ccNumber[18];
				echo "Your <b>".$creditCard."</b> ending in <b>".$lastFourDigits."</b> was charged for the following:<br />";
				//Calculate the cost of the tickets
				$costOfTickets = $numTickets * 25.00;
				$textOfTicketOrTickets = 'tickets';
				//Convert number of tickets to text
				if($numTickets == 1){
					$numTicketsText = 'One';
					$textOfTicketOrTickets = 'ticket';
				}elseif($numTickets == 2){
					$numTicketsText = 'Two';				
				}elseif ($numTickets == 3) {
					$numTicketsText = 'Three';
				}else{
					$numTicketsText = 'Four';
				}
				echo "<b>".$numTicketsText."</b> ".$textOfTicketOrTickets." for <i>".$ticketChoice."</i>:<b> $".number_format($costOfTickets, 2, '.', '')."</b><br />";
				echo "Donation: <b>$".number_format($donation, 2, '.', '')."</b><br />";
				echo "TOTAL CHARGED: <b>$".number_format(($costOfTickets + $donation),2,'.','')."</b><br />";
				echo "<hr>";
			}
			
        ?>
        <br /><br />
        <form action="index.php" method="post" name="formData">
	    	<label for="firstName">First Name : </label><input class="textInput" name ="firstName" type="text" value=<?php  echo $firstName; ?>></input> 
	    	<?php if($firstName == ""){echo $requiredFieldErrorMsg;} ?>
	   		<br/> 	
	    	<label for="lastName">Last Name : </label><input class="textInput" name ="lastName" type="text" value=<?php  echo $lastName; ?>></input>
	    	<?php if($lastName == ""){echo $requiredFieldErrorMsg;} ?>
	   		<br/> 
	    	<label for="ccNumber">Credit Card #: </label><input class="textInput" placeholder="XXXX-XXXX-XXXX-XXXX" name="ccNumber" type="text" value=<?php echo $ccNumber; ?> ></input>
	    	<?php 
	    		if($ccNumber == ""){echo $requiredFieldErrorMsg;}  
	    		if($ccNumberErrorBool){echo $ccNumberErrorMsg;} 
	    	?>
	   		<br/> 	    
	    	<label for="creditCard">Credit Card Type:</label> 
	    	<select name="creditCard">
	    	    <option value="" >SELECT</option>	    		
	    	    <option value="Visa" <?php if($creditCard == "Visa"){ echo " selected ";} ?> >Visa</option>
	    	    <option value="Mastercard" <?php if($creditCard== "Mastercard"){ echo " selected ";} ?> >Mastercard</option>
	    	    <option value="Discover" <?php if($creditCard == "Discover"){ echo " selected ";} ?> >Discover</option>
	    	</select>
	    	<?php if($creditCard == ""){echo $requiredFieldErrorMsg;} ?>
	   		<br/> 
	    	<label for="ticketChoice">Performance Date: </label>
	        <select name="ticketChoice">
	    	    <option value="" >SELECT</option>	        	
	    	    <option value="Sat., July 8th at 2:00pm" <?php if($ticketChoice == "Sat., July 8th at 2:00pm"){ echo " selected ";} ?> >Sat., July 8th at 2:00pm</option>
	    	    <option value="Sat., July 8th at 7:00pm" <?php if($ticketChoice == "Sat., July 8th at 7:00pm"){ echo " selected ";} ?> >Sat., July 8th at 7:00pm</option>
	    	    <option value="Sun., July 9th at 1:00pm" <?php if($ticketChoice == "Sun., July 9th at 1:00pm"){ echo " selected ";} ?> >Sun., July 9th at 1:00pm</option>
	    	    <option value="Sun., July 9th at 6:00pm" <?php if($ticketChoice == "Sun., July 9th at 6:00pm"){ echo " selected ";} ?> >Sun., July 9th at 6:00pm</option>
	    	</select>
	    	<?php if($ticketChoice == ""){echo $requiredFieldErrorMsg;} ?>
	   		<br/> 	    	
	    	<label for="numTickets">Number of Tickets<span class='asteriskText'>***</span></label>
	        <select name="numTickets">
	    	    <option value="" >SELECT</option>	        	
	    	    <option value='1' <?php if($numTickets == 1){ echo " selected ";} ?>  >1</option>
	    	    <option value='2' <?php if($numTickets == 2){ echo " selected ";} ?> >2</option>
	    	    <option value='3' <?php if($numTickets == 3){ echo " selected ";} ?> >3</option>
	    	    <option value='4' <?php if($numTickets == 4){ echo " selected ";} ?> >4</option>
	    	</select>
	    	<?php if($numTickets == ""){echo $requiredFieldErrorMsg;} ?>
	   		<br/> 
	        <input id="donationCheckbox" name="donation" type="checkbox" value="2" <?php if($donation == 2.00 ){ echo " checked ";} ?> ></input><label for="donation">Add $2.00 donation to the Balletic Arts Fund</label><br/>
	    	<br /><input id="submitBtn" type="submit" value="CLICK TO PURCHASE" name="submitButton"></input><br/>
        </form> 
    </div>
		<p id="specialNotes"><span class='asteriskText'>***</span>All tickets are for festival seating.<br /><span class='asteriskText'>***</span>For groups of 5 or more, please contact box office.</p>
        <footer>
            <hr>
			<img src="img/logo.png" alt="CSUMB Logo" /><br />
			CSUMB CST 336. 2018&copy; Doussias <br />
			<strong>Disclaimer:</strong> The information in this webpage is fictitious.<br />
			It is used for academic purposes only.<br />
		    <span id="referencesText">
		        <p>Image of dancers retrieved from pixabay.com on 7/8/2018 from the following link:</p>
		        <a  href="https://pixabay.com/en/adult-ballerinas-ballet-1850184/">https://pixabay.com/en/adult-ballerinas-ballet-1850184/</a>
		    </span>
		    <br /> <br /> <br />
		</footer>
        
    </body>
    
</html>