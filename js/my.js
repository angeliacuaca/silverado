$(document).ready(function(){
// $("#hsAlert").hide();
$("#msgName").hide();
$("#msgEmail").hide();
$("#msgMobile").hide();

//--------------------------MOVIE----------------------//

$("#CHdesc").hide();
$("#CHtime").hide();
$("#ACdesc").hide();
$("#ACtime").hide();
$("#AFdesc").hide();
$("#AFtime").hide();
$("#RCdesc").hide();
$("#RCtime").hide();

//Refresh change ticket for mobile
if ($(this).width() < 400) {
$("#RESplaying").show();
$("#playing").hide();
$(".more").hide();
$("#CHtime").show();
  $("#CHshort").show();
  $("#ACtime").show();
  $("#ACshort").show();
  $("#RCtime").show();
  $("#RCshort").show();
  $("#AFtime").show();
  $("#AFshort").show();

 }
else{
$("#RESplaying").hide();
$("#playing").show();
}
//Refresh end


//Resize change ticket for mobile
$(window).resize(function() {

  if ($(this).width() < 600) {
$("#CHtime").show();
  $("#CHshort").show();
  $("#ACtime").show();
  $("#ACshort").show();
  $("#RCtime").show();
  $("#RCshort").show();
  $("#AFtime").show();
  $("#AFshort").show();
  $("#RESplaying").show();
  $("#playing").hide();
$(".more").hide();


  } else {
$("#CHdesc").hide();
$("#CHtime").hide();
$("#ACdesc").hide();
$("#ACtime").hide();
$("#AFdesc").hide();
$("#AFtime").hide();
$("#RCdesc").hide();
$("#RCtime").hide();
$("#RESplaying").hide();
$("#playing").show();
$(".more").show();
if($("#CHmore").text()=='Less Info...'){
    $("#CHmore").text('More Info...');
    $("#CHshort").show();
}
if($("#ACmore").text()=='Less Info...'){
    $("#ACmore").text('More Info...');
    $("#ACshort").show();
}
if($("#AFmore").text()=='Less Info...'){
    $("#AFmore").text('More Info...');
    $("#AFshort").show();
}
if($("#RCmore").text()=='Less Info...'){
    $("#RCmore").text('More Info...');
    $("#RCshort").show();
}
    }

});
//Resize end

//show more
 $("#CHmore").click(function(){
    $("#CHdesc").toggle(500);
    $("#CHtime").toggle(500);
 if($("#CHmore").text()=='Less Info...'){
  $("#CHmore").text('More Info...');
    $("#CHshort").show();
}
else{$("#CHmore").text('Less Info...');
	$("#CHshort").hide();
}
});

 $("#ACmore").click(function(){
    $("#ACdesc").toggle(500);
    $("#ACtime").toggle(500);
    if($("#ACmore").text()=='Less Info...'){
    $("#ACmore").text('More Info...');
    $("#ACshort").show();

}
else{$("#ACmore").text('Less Info...');
	$("#ACshort").hide();
}
});

 $("#AFmore").click(function(){
    $("#AFdesc").toggle(500);
    $("#AFtime").toggle(500);
    if($("#AFmore").text()=='Less Info...'){
    $("#AFmore").text('More Info...');
    $("#AFshort").show();

}
else{$("#AFmore").text('Less Info...');
	$("#AFshort").hide();
}
});

 $("#RCmore").click(function(){
    $("#RCdesc").toggle(500);
    $("#RCtime").toggle(500);
    if($("#RCmore").text()=='Less Info...'){
    $("#RCmore").text('More Info...');
    $("#RCshort").show();

}
else{$("#RCmore").text('Less Info...');
	$("#RCshort").hide();
}
});
//show more END
//-------------------------REAL TIME CALCULATION---------------

var cheap = $("#cheap").val();
if (cheap == 'false') {
$("#priceSA").text("$18");
$("#priceSP").text("$15");
$("#priceSC").text("$12");
$("#priceFA").text("$30");
$("#priceFC").text("$25");
$("#priceB1").text("$30");
$("#priceB2").text("$30");
$("#priceB3").text("$30");
}
else if (cheap == 'true'){
$("#priceSA").text("$12");
$("#priceSP").text("$10");
$("#priceSC").text("$8");
$("#priceFA").text("$25");
$("#priceFC").text("$20");
$("#priceB1").text("$20");
$("#priceB2").text("$20");
$("#priceB3").text("$20");
}

else {
  cheap ="";
}
;


var movPrice=0;
if(movPrice==0){
$('#btnPay').hide();  
$('#btnCon').hide();  

}
else{
  $('#btnPay').show();
$('#btnCon').show();  
}

$("select").change(function() {

var quantity=$(this).val();
 var quant = $(this).attr('id') ;
var sub= quant.substring(7,5);
var price=$("#price"+sub).text();
price=price.substring(1,4);
var total=parseFloat(price)*parseFloat(quantity);

$("#total"+sub).text("$"+total.toFixed(2));

var totalSA=$("#totalSA").text();
totalSA=totalSA.substring(1,7);
var totalSP=$("#totalSP").text();
totalSP=totalSP.substring(1,7);
var totalSC=$("#totalSC").text();
totalSC=totalSC.substring(1,7);
var totalFA=$("#totalFA").text();
totalFA=totalFA.substring(1,7);
var totalFC=$("#totalFC").text();
totalFC=totalFC.substring(1,7);
var totalB1=$("#totalB1").text();
totalB1=totalB1.substring(1,7);
var totalB2=$("#totalB2").text();
totalB2=totalB2.substring(1,7);
var totalB3=$("#totalB3").text();
totalB3=totalB3.substring(1,7);
var movPrice = parseFloat(totalSA)+parseFloat(totalSP)+parseFloat(totalSC)+parseFloat(totalFA)+parseFloat(totalFC)+parseFloat(totalB1)+parseFloat(totalB2)+parseFloat(totalB3);


 $(".ticSum #sumPrice").text( "$"+movPrice.toFixed(2) );

//hide button pay if 0
if(movPrice==0){
$('#btnPay').hide();  
$('#btnCon').hide();  

}
else{
  $('#btnPay').show();
$('#btnCon').show();  
}

//hidden value to post
$(".ticSum #movPrice").val( movPrice.toFixed(2) );
$(".ticInner #postSA").val(parseFloat(totalSA).toFixed(2));
$(".ticInner #postSP").val(parseFloat(totalSP).toFixed(2));
$(".ticInner #postSC").val(parseFloat(totalSC).toFixed(2));
$(".ticInner #postFA").val(parseFloat(totalFA).toFixed(2));
$(".ticInner #postFC").val(parseFloat(totalFC).toFixed(2));
$(".ticInner #postB1").val(parseFloat(totalB1).toFixed(2));
$(".ticInner #postB2").val(parseFloat(totalB2).toFixed(2));
$(".ticInner #postB3").val(parseFloat(totalB3).toFixed(2));


});



// -----------------------AJAX POST


    //     $("form[ajax=true]").submit(function(e) {
        
    //     e.preventDefault();
        
    //     $("#loadingimg").show();
        
    //     $.ajax({
    //         url: "http://titan.csit.rmit.edu.au/~e54061/wp/movie-service.php", 
    //         type: "GET",      
    //         data: {day:'Monday'},     
    //         // cache: false,
    //         success: function(returnhtml){                          
    //             // $("#msgVoucher").html(returnhtml); 
    //             $("#loadingimg").hide();  
    //             alert(returnhtml);                  
    //         }            
    //     });    
        
    // }); 


    $("form[ajax=true]").submit(function(e) {
        
        e.preventDefault();
        
        var form_data = $(this).serialize();
        var form_url = $(this).attr("action");
        var form_method = $(this).attr("method").toUpperCase();
        
        
        $.ajax({
            url: form_url, 
            type: form_method,      
            data: form_data,     
            cache: false,
            success: function(returnhtml){   
            // $("#hsAlert").show();                       
                // $("#msgError").html(returnhtml);  
                // alert(form_data);      
                window.location.replace('index.php?page=cart');            
            }            
        });    
        
    });



//----------------------AJAX TEST END

// function btnContinue() {
//     document.getElementById("conSub").submit();
// }


$("#cMobile").change(function() {
  // alert();
  var strMob=$("#cMobile").val();
var pattMob = /^\(?(?:\+?61|0)4\)?(?:[ -]?[0-9]){7}[0-9]$/;
    var resMob = pattMob.test(strMob);
    if(resMob==true){
$("#msgMobile").hide(500);
}
});

$("#cName").change(function() {
  // alert();
  var str=$("#cName").val();
var patt = /^[A-Za-z ']+$/;
    var res = patt.test(str);
    if(res==true){
$("#msgName").hide(500);
}
});

$("#cName").change(function() {
  // alert();
  var str=$("#cName").val();
var patt = /^[A-Za-z ']+$/;
    var res = patt.test(str);
    if(res==true){
$("#msgName").hide(500);
}
});

$("#cEmail").change(function() {
  // alert();
  var str=$("#cEmail").val();
var patt=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
    var res = patt.test(str);
    if(res==true){
$("#msgEmail").hide(500);
}
});


});


//-----------------------JAVASCRIPT onevent

function chkHyphen( fld, pos ) {
for (var i = 0; i < pos.length; i++) {
if ( pos[i] == fld.value.length ) fld.value += '-';
}
};

//-----------------------------------------
function checkVoucher(){
    var str = document.getElementById("cVoucher").value;
 var patt = /^([0-9]{5}-){2}[A-Z]{2}$/;
    var res = patt.test(str);
    if (res == true){
      document.getElementById("error").innerHTML = "true " +str;
      alert(str);
    }
      else{
      document.getElementById("error").innerHTML = "false " +str;

      }

}




//-----------------------------------

function checkStr() {
    var str = document.getElementById("cName").value;
    var patt = /^[A-Za-z ']+$/;
    var res = patt.test(str);
  if (res == true){
      document.getElementById("msgName").style.display='block';
      document.getElementById("msgName").innerHTML ='<p class="greens">Correct Input Name</p>';
    }
    else{
document.getElementById("msgName").style.display='block';
document.getElementById("msgName").innerHTML ="<ul><li>Must Be Only Characters</li><li>unless you have O'Really name</li></ul>";

    }
}

function checkMob() {
  
    var str = document.getElementById("cMobile").value;
    var patt = /^\(?(?:\+?61 ?|0)4\)?(?:[ -]?[0-9]){7}[0-9]$/;
    var res = patt.test(str);
     var replaced = reMobile(str);
replaced= replaced.replace(/\s+|\-+/g, '');
    if (res == true){
      document.getElementById("msgMobile").style.display='block';
      document.getElementById("msgMobile").innerHTML ='<p class="greens">Mobile Number Validate</p>';
      document.getElementById("crMobile").value = replaced;
      // alert(document.getElementById("crMobile").value);
    }
    else{
document.getElementById("msgMobile").style.display='block';
document.getElementById("msgMobile").innerHTML ="<ul><li>Must be an Australian Mobile Number</li><li>Input: " +replaced+ "</li></ul>";
    }
}


function reMobile(x) {
    return x.replace(/04|\+?61 ?4|\(04\)/,'04');
}

function Mob(){
  var str = document.getElementById("cMobile").value;
var replaced = reMobile(str);
replaced= replaced.replace(/\s+|\-+/g, '');
}

function checkEmail() {
    var str = document.getElementById("cEmail").value;
    //email regex help from http://emailregex.com/
var patt=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
    var res = patt.test(str);
  if (res == true){
      document.getElementById("msgEmail").style.display='block';
      document.getElementById("msgEmail").innerHTML ='<p class="greens">Email Validated</p>';
    }
    else{
document.getElementById("msgEmail").style.display='block';
document.getElementById("msgEmail").innerHTML ="<ul><li>Please Enter Valid Email Address</li><li>You will use this detail to view booked ticket</li></ul>";

    }
}

function emptyCart(){
  // document.getElementById("emptyCartForm").submit();
  document.emptyCartForm.submit()
}





