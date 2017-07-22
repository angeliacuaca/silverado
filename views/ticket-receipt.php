<?php
if (!isset($_SESSION)) session_start();




if(isset($_SESSION['user']['order-no'])||(isset($_GET['email']) && isset($_GET['token']))){
if(!isset($_SESSION['user'])){
  echo "<p>you have not login yet</p>";
header("Location: check/login.php?page=ticket&email=".urlencode($_GET['email'])."&token=".$_GET['token']);

}

?>
<div class="ticRec">
  <div class="ticMenu">
<a id="tPrint" href="views/print.php" target="_blank"><img src="img/icon/print-blue.png"></a>
<a id="tView" href="index.php?page=ticket&action=view"><img src="img/icon/ticket-blue.png"></a>
<a id="vRec" href="index.php?page=ticket&action=receipt"><img src="img/icon/receipt-blue.png"></a>
</div>

<div class="reQR">
<div class="reQRtop"><h3>This is Your Reservation Ticket</h3></div>
<div class="reQRcode"><img src='https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=<?php  echo strtolower($orderNo); ?>'></div>
<div class="reQRbot"><p>
  &#8226; Please present this ticket to our staff.<br>
  &#8226; Ticket will not be valid until the payment clear.<br>
  &#8226; Contact our front desk for more information.</p></div>
</div>

<?php
for ($i=0; $i <count($userDB) ; $i++) { 
$user=$userDB[$i];

if($user['order-no']==$orderNo){
?>

<div class="cusInfo">
<h3>
 Thank You <?php echo $user['name'];?>!
</h3>
<p><span class="boldy">Please note the details below or bookmark this page.</span></p>
<p>
<!-- <span>Your Unique ID:</span><span class="boldy"> <?php echo $user['order-no']; ?></span><br> -->
<span>Your login details to revisit this page:</span></p>

<p><span> &#8226;Email: <?php echo $user['email'];?> </span><br>
&#8226;Password: <span class="boldy"> <?php echo $user['order-no'];?> </span></p>

<p><span>However, you still need to finished the payment to activate the barcode.</span></p>
<p><span>Amount Due: </span><span class="boldy" id="grandG"><?php echo "$".$user['grand-total']; ?></span></p>
<br>
<p><span>Please contact us if you forgot, we will send it to your mobile:</span><span class="boldy"> <?php echo preg_replace("/^(\d{4})(\d{3})(\d{3})$/", "$1 $2 $3", $user['mobile']);?></span></p>
<p><span>Forgot to print your ticket? No Worries! With your smartphone,
 show this barcode to our overly friendly front-desk when you make the payment, they'll print the tickets for you</span></p>

<p><span>If you paid for this receipt with phone already,
 just go ahead to our studio by showing your printed ticket or with smartphone</span></p>

<div class="recB">
 <a class="cSubmit" href="index.php?user=logout">Logout</a>
   <a class="cSubmit" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">back</a>
</div>
</div>


<?php
break;
}


}
echo "</div>";    

}?>

