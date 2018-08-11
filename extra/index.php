<!-- 
Mac Doussias
Extra Credit
CSUMB
-->

<!DOCTYPE html>
<html>


<head>
    <title>API EXTRA CREDIT</title>
    <style> @import url("css/style.css"); </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <h1>EXTRA CREDIT<bR>FIND BOOKS IN GOOGLE BOOKs</h1>
    
    <div>
        <input class="input-group mb-3" id='search' placeholder='SEARCH TITLE OF BOOK'><bR>
        <button id='button' type='button' class='btn btn-primary'>SEARCH</button><br><br><br><br>
        <div id='results'></div> <!-- This is where the AJAX call will display the results-->
        
        <script src='js/js.js'></script>
    </div>
    <br><br><br>    <br><hr>
    <div>
        <p class='note' style="color:red; font-size: 1.2em;">
            Note to person grading:<br />
            I struggled a little bit with connecting to an API so I worked through some youtube tutorials.<br />
            A tutorial helped me connect to a google API and then I added some code on top and retrieved more fields.<br />
            A lot of this code comes from the tutorial and some directly from google's developer page, 
            <br> so I am not sure if this should mean partial credit or no credit.  I did add a lot more code, and retrieved extra fields from the API<br />
            <br><br>
            This is the google api documentation,the provide a lot of the code as well:<br>
            <a href="https://developers.google.com/books/docs/viewer/developers_guide">https://developers.google.com/books/docs/viewer/developers_guide</a>
            <br><br>
            This is the youtube video of one of the videos I used to get connected.<br>
            <a href="https://www.youtube.com/watch?v=uI_UP0pgsDE">https://www.youtube.com/watch?v=uI_UP0pgsDE</a>
            <br><br>
            I did not create a database or functionality to track the number of times searched.
            <br><br>
            Thank you for a great class!  I learned a lot and I'll definitely continue working with APIs in the future.<br> It's an awesome technology to know.
        </p>
    </div>
    
    
    
</body>
    
</html>