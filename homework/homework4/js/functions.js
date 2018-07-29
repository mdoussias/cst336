//JS FILE FOR FUNCTIONS
//Mac Doussias
//Homework 4
//CST336 CSUMB
function move(){
    //Create variables that hold the cartesian plane values
    var xCat = Math.floor(Math.random()*401);
    var yCat = Math.floor(Math.random()*201);
    var xDog = Math.floor(Math.random()*411);
    var yDog = Math.floor(Math.random()*201);
    
    //Reset the coordinate positions of the cat and dog images 
    document.getElementById('cat').style.left = xCat+'px';
    document.getElementById('cat').style.top = yCat+'px';
    document.getElementById('dog').style.left = xDog+'px';
    document.getElementById('dog').style.top = yDog+'px';
}