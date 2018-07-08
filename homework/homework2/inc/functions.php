<?php

/*
Main function for random number generation displayed on screen in different ways
*/
function play(){
    $randomInt = rand(0,255);
    echo "<p>Your random number is:  $randomInt<p/> <br />";
    echo "Your random number in binary is: ";
    makeIntBinary($randomInt); //Echos an argument integer in binary    
}


/*
This function receives an integer argument and then echos it out as a binary number
*/
function makeIntBinary($intArg){
    /*First find how many binary bits are needed to represent the integer*/  
    $numberOfBinaryBits = 1;
    $valueOfLargestBit = 1;    
    $runLoop = true;
    while($runLoop){
        if($intArg > $valueOfLargestBit){
               $numberOfBinaryBits += 1;
               $valueOfLargestBit = ((($valueOfLargestBit+1)*2)-1);
        } else {
            $runLoop = false;  //The loop has already found out how many bits are needed          
        }
    }
    
    //This adds one to ensure that the value is correct for the following for loop
    $valueOfLargestBit += 1;
        
    $binaryArray = array();  //Make a blank array
    for($i = 0; $i < $numberOfBinaryBits; $i++){
        $valueOfLargestBit = $valueOfLargestBit/2;
        if( $intArg >= $valueOfLargestBit ){
            $binaryArray[$i] = 1; 
            $intArg -= $valueOfLargestBit;
        }else{
            $binaryArray[$i] = 0;
        }
    }
    
    // Print the array that represents the binary number
   for($i = 0; $i < $numberOfBinaryBits; $i++){
       echo $binaryArray[$i];
   }

} //End of the function






/*
Images from the following:
Pixabay: Green Binary image
https://pixabay.com/en/binary-code-binary-binary-system-475664/
*/



?>