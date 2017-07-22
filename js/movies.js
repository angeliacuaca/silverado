$(document).ready(function(){

$("#dem").hide();

    $("#viewMovies").click(function(){
$.post("http://titan.csit.rmit.edu.au/~e54061/wp/movie-service.php",
        { movieID: "RC", day: "Mon" },
        function(returnedData,status){

// if(status="success"){
// $("#dem").html(returnedData);
// }
// else{
//     $("#dem").html("unable to retrieve sessions");
// }

            alert("Data: " + returnedData + "\nStatus: " + status);
        });


    });
});

