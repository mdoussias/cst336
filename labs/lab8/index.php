<!--
Mac Doussias
CST 336 Homework CSUMB
LAB8
QUIZ


TODO  Something is wrong with the 'display' attrivbutes
Make sure you check according to the assignment the display


TODO something is wrong with how it is averaging 
Make sure you check the SQL pull
-->
<?php
session_start();


//displays Quiz if session is active
    function displayQuiz(){
        if(isset($_SESSION['username'])){
            include 'quiz.php';  //Display the quiz if the session is set
        }else{
            header('Location: login.php'); //If the session is not set, head back to the login page
        }
    } //END OF FUNCTION DISPLAYQUZ
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CSUMB Online Quiz</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <!--Display user and logout button-->
        <div class="user-menu">
            <?php echo "Welcome ".$_SESSION['username']."! ";?> 
            <input type="button" id="logoutBtn" value="Logout" />    
        </div>
        
        <div class="content-wrapper">
            
            <!--Display Quiz Content-->
            <div id="quiz">
                <h1>Quiz</h1>
                <?=displayQuiz()?>    
            
                <div id='feedback'>
                    <h2>Your final score is <span id='score'>score</span></h2>
                    
                    You've taken this quiz <strong id='times'>time(s).</strong> <br /><br />
                    
                    You're average score was <strong id='average'></strong> <br /><br />
                </div>
            </div>
            <div id="mascot">
                <img src="img/mascot.png" alt="CSUMB Mascot" width="350" />
            </div>
        </div>
        
        <!--Javascript files-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src='js/gradeQuiz.js'></script> 
    </body>
</html>

<!-- TODO Need a loading.gif for this assignment   Not showing properly--> 