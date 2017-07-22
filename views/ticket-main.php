<?php
if (!isset($_SESSION)) session_start();

$errorLogin= "";
if(isset($_GET['error'])){
  $errorLogin="Invalid email or password. Please contact our customer service.";
}else{$errorLogin="";}
$callPage="ticket-receipt.php";
if(isset($_GET['action'])){

$action=$_GET['action'];


switch ($action) {
  case 'receipt':
    $callPage="ticket-receipt.php";
    break;
  case 'view':
    $callPage="ticket-view.php";
    break;
  default:
    $callPage="ticket-receipt.php";
    break;
}

}
else{
  $callPage="ticket-receipt.php";
}

$jsonDB=file_get_contents('check/receipts.json');
$userDB=json_decode($jsonDB,true);


?>
<div class="nav">
   <a class="navBtn" href="index.php">Schedule</a>  
  <a class="navBtn" href="index.php?page=movie">Movies</a>
  <a class="navBtn selected" href="index.php?page=ticket">Ticket</a>
  <a class="navBtn" href="index.php?page=contact">Contact</a>
  <div class="logoDiv">
  <img class="logoAbs" src="img/logo.png" alt="logo">
</div>
  <div class="clear-shadow"></div>
 
<div class="content">
  <div class="inner"> 

    <?php 


// include_once("ticket-receipt.php");
include_once($callPage);


if(!isset($_SESSION['user'])){
?>

     <div class="customerCon">
    <div class="pleaseFill">Login to view booked ticket</div>
  


 <div class="cusEmail">
<p id="erL" class="validationMsg"><?php echo $errorLogin;?></p>
 <form action="check/login.php" method="get"> 
    <p id="msgEmail" class="validationMsg">Please Enter a Valid Email Address</p>
<label for="cEmail">Email:  </label>
<input type="email" id="email" name="email" oninput="checkEmail()" pattern="^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$" class="cEmail" placeholder="Input your email" required>
  </div>

   <div class="cusName">
<p id="msgPass" class="validationMsg">Please use your unique ID as password</p>
<label for="cName">Password:  </label>
<input type="password" id="token" name="token" class="cName" placeholder="Input Your Order Number">

  </div>


 <div class="cusSubmit">
 
<button type="submit" id="loginSub" >Login</button>
 <a class="cSubmit" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">BACK</a>

  </div>
  </form>
</div> <!-- END customerCon-->


<?php
}

?>



</div>
   <div class="clearDiv"> </div>
</div>
</div>