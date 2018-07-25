
//Maco Doussias
//CST336
//LAB7

// ------------------------------------------------------ VARIABLES
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [ {word: "snake", hint: "It's a reptile"},
    {word: "monkey", hint: "It's a mammal"},
    {word: "beetle", hint: "It's an insect"} ];

// Creating an array of available letters
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
    'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 
    'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

// ------------------------------------------------------ LISTENERS
window.onload = startGame(); // function will run when the web page is loaded

$(".letter").click(function(){
    checkLetter($(this).attr("id"));
});

// Listener for the win and loss buttons
$(".replayBtn").on("click", function(){
   location.reload(); 
});	

//Listener for when a letter button is called, to disable it
$(".letter").click(function(){
   checkLetter($(this).attr("id"));
   disableButton($(this));
});

$(".hintBtn").click(function(){
    $('.hint').show();
    remainingGuesses -= 1;
    updateMan(); // Update the hangman image
});

// ------------------------------------------------------ FUNCTIONS

function startGame(){
    pickWord();
    initBoard();
    createLetters();
    updateBoard();
   // updateMan(); this does not work here
}


function pickWord(){
    var randomInt = Math.floor(Math.random() * words.length)
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

// Create letters inside the letters div
function createLetters(){
    for(var letter of alphabet){
        $('#letters').append("<button class='letter' id='"+letter+"'>"+letter+"</button>");
    }
}



function checkLetter(letter){
    var positions = new Array();
    
    for (var i = 0; i < selectedWord.length; i++){
        if(letter == selectedWord[i]){
            positions.push(i);
        }
    }
    
    if(positions.length > 0){
        updateWord(positions, letter);
        
        //Check to see if this is a winning guess
        if(!board.includes('_')){ //If the board has no more letters to guess then there are no _
            endGame(true); //Game has been won
        }
    }else{
        remainingGuesses -= 1;
        updateMan(); // Update the hangman image
    }
    
    if(remainingGuesses <= 0){ //User is out of guesses if true
        endGame(false); //you did not win the game
    }
}

function updateWord(positions, letter){
    for(var pos of positions){
        board[pos] = letter;
    }
    
    updateBoard(); 
}


//Updates the boards html   			
function updateBoard(){
    $("#word").empty();
    
    for (var i=0; i < board.length; i++){
        $("#word").append(board[i]+" ");
    }
    $("#word").append('<br />');
    $("#word").append("<span class='hint'>Hint: "+selectedHint+"</span>");
}   








function initBoard(){
    for (var letter in selectedWord){
        board.push("_");
   	}
}
   			



// Calculates and updates the image for our stick man
function updateMan(){
    $('#hangImg').attr("src","img/stick_"+(6-remainingGuesses)+".png");
}
   			
	
// Ends the game by hiding the game divs and displaying the win or loss divs	
function endGame(win){
    $("#letters").hide();
    if(win){
        $('#won').show();
    }else{
        $('#lost').show();
    }
}	


	
	
	
//Disables the button and changes the style to tell the user it is disabled	
function disableButton(btn){
    btn.prop("disabled",true);
    btn.attr("class","btn btn-danger");
}	
	
