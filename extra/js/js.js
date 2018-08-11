function searcher(){
    var search = document.getElementById('search').value
    document.getElementById('results').innerHTML = ''
    console.log(search)
    
    $.ajax({
        url: 'https://www.googleapis.com/books/v1/volumes?q=' + search,
        dataType: 'json', // this is teh type of data you are going to use
        
        // If successful conneciton the data as a parameter will read in a table, within the function
        success: function(data){
            for(i = 0; i< data.items.length; i++){
             results.innerHTML += '<p><b>TITLE:</b>  ' + data.items[i].volumeInfo.title 
                    + '  | <b>AUTHOR:</b>   ' + data.items[i].volumeInfo.authors 
                    + ' | <b>PUBLISHED:</b>   ' + data.items[i].volumeInfo.publishedDate
                    +'</p>' 
            }
        },
        
        type: 'GET'  //Always check if this is POST or GET according to the documentation
    });
}

document.getElementById('button').addEventListener('click', searcher, false)

