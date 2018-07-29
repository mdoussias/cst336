//JS FILE FOR FUNCTIONS
//Mac Doussias
//Homework 4
//CST336 CSUMB
function move(){
    //Create variables that hold the cartesian plane values
    var xCoordinate = Math.floor(Math.random()*601);
    var yCoordinate = Math.floor(Math.random()*401);

    //Reset the coordinate positions of the main tag button
    document.getElementById('main').style.left = xCoordinate+'px';
    document.getElementById('main').style.top = yCoordinate+'px';
}