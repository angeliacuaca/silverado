<!-- all Gradients are from http://www.colorzilla.com/gradient-editor/
  all box and shadows are generate from www.cssmatic.com/box-shadow
  all animations and transitions are generate from http://cssanimate.com/
along site with multi generator http://css3generator.com/ 
Dolby embed video are from www.dolby.com/us/en/platforms/dolby-cinema.html
Those links are put as hyperlinks under footer section-->

<?php

session_start();

if(isset($_GET['user'])){
  if($_GET['user']=='logout'){
  if (isset($_SESSION['user'])) unset($_SESSION['user']);
  if (isset($_SESSION['cart'])) unset($_SESSION['cart']);
    session_destroy();
    session_start();
  }
}

if (!isset($_SESSION)) session_start();

  if(isset($_COOKIE['PHPSESSID'])){    
unset($_COOKIE['PHPSESSID']);
setcookie('PHPSESSID', '', time()-1);
  }
  


// include("check/session.php");

if(isset($_SESSION['user']))
  {
    $isLogin=true;
$uNA=$_SESSION['user']['name'];
$uEM=$_SESSION['user']['email'];
$uMO=$_SESSION['user']['mobile'];
$uCA=$_SESSION['user']['cart'];
$uTO=$_SESSION['user']['total'];
$uVO=$_SESSION['user']['voucher'];
$uGT=$_SESSION['user']['grand-total'];
$orderNo=$_SESSION['user']['order-no'];
$welcome="Hi ".$uNA."! </span>
<a href='index.php?user=logout'><img alt='logout' src='img/icon/logout.png'></a>";
} 
else{ 

$uNA="";
$uEM="";
$uMO="";
$uCA="";
$uTO="";
$uVO="";
$uGT="";
$orderNo="";
$welcome="</span>";
$userIcon="";
$isLogin=false;
}

if (isset($_SESSION['cart'])) {
  $cartCount=count($_SESSION['cart']['Screenings']); 
}else{
  $cartCount=0;
}


// if (isset($_SESSION['previous'])){

//   if( $_SESSION['previous']=="addCart"){
//   $pageMain='views/booking-main.php';
//   echo $_SESSION['previous'];
// }
// }
// if(isset($_SESSION['user'])){
//   echo "view ticket here";
// }

# You can even create content for a default "page not found" page
// $page-title= 'file-not-found-title.php'; 
// $page-main = 'file-not-found-main.php'; 

# Look for valid pages 
if(isset($_POST['movTitle'])){
  $pageMain='views/booking-main.php';

  $movID = $_POST['movID'];
  $movTitle = $_POST['movTitle'];
  $movGenre =  $_POST['movGenre'];
  $movPoster =  $_POST['movPoster'];
  $movTime = strtoupper($_POST['movTime']);
  $movDay = $_POST['movDay'];
  $movRating = $_POST['movRating'];
  $movClass = $_POST['movClass'];

      if ($movDay=="MONDAY" || $movDay=="TUESDAY" || $movTime=="1PM"){
      $cheap='true';
    }
    else{
      $cheap='false';
    }



}
else if( isset($_GET['page'])){
$validPages=['schedule','contact','movie','cart','ticket']; 
    if(in_array($_GET['page'],$validPages) ) {
    // $pageTitle= $_GET['page'].'-title.php'; 
    $pageMain= 'views/'.$_GET['page'].'-main.php'; 

    if(file_exists('views/'.$_GET['page'].'-footer.php')){
    $pageFooter= 'views/'.$_GET['page'].'-footer.php';}

    # Some pages may need extra tools 
    // switch ($_GET['page']) {
    // case 'movie': include_once('movie-main.php'); break;
    // case 'cart': include_once('cart-page-tools.php'); break;
    // }

    } //inarrayIF Closed
    else{
      echo "invalid GET fix this with NOT FOUND";
      $pageMain = 'views/schedule-main.php'; 
    }

}

else{
// $pageTitle= 'schedule-title.php'; 
$pageMain = 'views/schedule-main.php'; 
}

?>




<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1" name="viewport"></meta>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"></meta>
<link rel="stylesheet" href="css/book.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<!-- <script type="text/javascript" src="js/function.js"></script> -->

<link href='//fonts.googleapis.com/css?family=Kreon' rel='stylesheet' type='text/css'>
<title>Welcome To Silverado Cinemas</title>
</head>

<body>

<div class="container">
<?php
include_once('views/header.php');

include_once($pageMain);
// include_once('booking.php');
// include_once('views/ticket-main.php');

include_once('views/footer.php');
// include_once('views/movie-footer.php');

// if(file_exists($pageFooter)){include_once($pageFooter);}
if(isset($pageFooter)){
  // echo "aa";
include_once($pageFooter);
}
?>

</div>


<!-- jquery and bootstrap START -->
<!-- I'm using components that I understand only for design purpose (shadow, animation), costumized bootstrap generate from http://getbootstrap.com/customize/?id=c349c3b55169200bd1bb -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/my.js"></script>
<!-- jquery and bootstrap END -->

</body>
</html>
