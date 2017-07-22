<?php


if (!isset($_SESSION)) session_start();


// var_dump($_SESSION['cart']);
// $mov = var_dump($_SESSION['cart']);
// echo json_encode($mov, JSON_PRETTY_PRINT);
	// echo '<pre>';
// print_r($_SESSION['cart']);
// echo '</pre>';

//------------------
// $type="thishishis";
// $meta=<<<"YOLO"
// YOLO;
// echo $meta;
//------------------//

//------------------VOUCHER	
$valV="No Voucher";
$msgV='<p id="msgVoucher" class="validationMsg"></p>';
$useV=false;
$isEmpty=false;
$visV="granCon invisible";
if(isset($_POST['cVoucher'])){

$getCode=$_POST['cVoucher'];
$AZ=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
// $AZ=array(range('A','Z'));

$val1=substr($getCode,0, 5);
$val2=substr($getCode,6, 10);
$val1Ar=str_split($val1,1);
$val2Ar=str_split($val2,1);
// (((1*2)+3)(4+5))%26
$sum1=((($val1Ar[0]*$val1Ar[1])+$val1Ar[2])*$val1Ar[3]+$val1Ar[4])%26;
$sum2=((($val2Ar[0]*$val2Ar[1])+$val2Ar[2])*$val2Ar[3]+$val2Ar[4])%26;
// $valV=$val1.$val2;
$sums=$AZ[$sum1].$AZ[$sum2];
$checkSum=substr($getCode, -2);
$valV=$getCode;
if($checkSum!=$sums){
	$msgV='<p id="msgVoucher" class="validationMsg">Invalid Voucher Code</p>';
	$visV="grandCon invisible";
	$useV=false;

}else{
	$msgV='<p id="msgVoucher" class="validationMsg greens">Voucher Added</p>';
	$visV="grandCon";
	$useV=true;
}
}

////-------------END check voucher
?>

<div class="nav">

    <a class="navBtn" href="index.php">Schedule</a>  
  <a class="selected navBtn" href="index.php?page=movie" onmouseover="this.innerHTML='Movie'" onmouseout="this.innerHTML='Booking'" >Booking</a>
  <a class="navBtn" href="index.php?page=ticket">Ticket</a>
  <a class="navBtn" href="index.php?page=contact">Contact</a>
  <div class="logoDiv">

  <img class="logoAbs" src="img/logo.png" alt="logo">
</div>
 <div class="clear-shadow"></div>
<div class="content">

<!-- <div class="alert alert-danger" role="alert" id="hsAlert">
  <span class="errorDiv glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  <p id="error" class="errorMessage">Enter a valid email address</p>
</div> -->
<div class="cartTable">
  <div class="ticOutter">
  <div class="ticBorder">
	  <div class="tichd">
	    <div class="ticOutter">
	      <h2>Shopping Cart</h2>
	  </div>
	</div>
      <div class="ticbd borderDot">
          <div class="ticInner">
              
<div class="ticbd">
	<?php
if (isset($_SESSION['cart']["Screenings"])) {
$ticGTotal=array();

for($i=0; $i<count($_SESSION['cart']['Screenings']);$i++){

$cartMov= $_SESSION['cart']['Screenings'][$i]['movie'];
$cartDay= $_SESSION['cart']['Screenings'][$i]['day'];
$cartTime= $_SESSION['cart']['Screenings'][$i]['time'];
$cartSeats=$_SESSION['cart']['Screenings'][$i]['seats'];
$ticSTotal=$_SESSION['cart']['Screenings'][$i]['sub-total'];
array_push($ticGTotal,$ticSTotal);
$sumGT=array_sum($ticGTotal);

if($useV==false){
  $sumGTD=$sumGT;
}else{
$sumGTD=$sumGT-($sumGT*0.2);
}
echo'<form action="check/deleteCart.php" method="post" ajax="true">';
echo '<input type="hidden" name="deleteCart" value="'.$i.'">';
?>
<div class="cartCon"><div class="clearDiv"><hr></div>

<div class="row rowTitle"><?php echo strtoupper($cartMov); ?></div>
<div class="row rowSession">Showing at <?php echo $cartDay.' '.$cartTime; ?></div>
<div class="row ticH1">
                          <div class="col cartT">
                              <div class="ticInner">
                                  Ticket Type
                              </div>
                          </div>
                          <div class="col cartP">
                              <div class="ticInner">
                                  Price
                              </div>
                          </div>
                          <div class="col cartQ">
                                  <div class="ticInner">
                                      Quantity
                                  </div>
                          </div>
                           <div class="col cartS">
                                  <div class="ticInner">
                                      Seats
                                  </div>
                          </div>
                          <div class="col cartSub">
                              <div class="ticInner">
                                  Subtotal
                              </div>
                          </div>
          </div>

<?php
// print_r($cartSeats);
foreach ($cartSeats as $seatID => $value) {
switch ($seatID) {
		case 'SA':
		$ticType="Adult";
			break;
		case 'SP':
		$ticType="Concession";
			break;	
		case 'SC':
		$ticType="Children";
			break;
		case 'FA':
		$ticType="First Class Adult";
			break;
		case 'FC':
		$ticType="First Class Children";
			break;
		case 'B1':
		$ticType="Beanbag 1 Person";
			break;
		case 'B2':
		$ticType="Beanbag 2 People";
			break;
		case 'B3':
		$ticType="Beanbag 3 Children";
			break;									
		default:
		$ticType="not Selected";
			break;
}

$ticQ=$value['quantity'];
$ticP=$value['price'];
$ticS=$value['seats'];
?>
 <div class="row">
<div class="col cartT">
<div class="ticInner"><?php echo $ticType; ?></div>
</div>
<div class="col cartP">
<div class="ticInner">$<?php echo number_format((float)$ticP, 2, '.', ''); ?></div>
</div>
<div class="col cartQ">
<div class="ticInner"><?php echo $ticQ; ?></div>
</div>
<div class="col cartS">
<div class="ticInner"><?php 

for ($a=0; $a <count($ticS) ; $a++) { 
	if($a==count($ticS)-1){
echo $ticS[$a];
}else{echo $ticS[$a].", ";}
}

?></div>

</div>
<div class="col cartSub">                        
<div class="ticInner">$<?php echo number_format((float)$ticP*$ticQ, 2, '.', ''); ?></div>
</div>
      </div>
<?php
}
?>
<div class="row">
<div class="cartT">
<div class="ticInner"></div></div>
<div class="cartP">
<div class="ticInner"></div></div>
<div class="cartQ">
<div class="ticInner"></div></div>
<div class="TotalS boldy">
	<div class="ticInner">TOTAL</div></div>
<div class="col cartSub boldy">
	<div class="ticInner">$<?php echo number_format((float)$ticSTotal, 2, '.', ''); ?></div>
</div>

</div>
<div class="row"><br></div>
 <div class="row">
<div class="cartT">
<div class="ticInner"></div></div>
<div class="cartP">
<div class="ticInner"></div></div>
<div class="cartQ">
<div class="ticInner"></div></div>
<div class="TotalS">
	<div class="ticInner"></div></div>
<div class="cartSub">

	<div class="ticInner"><a href="#" onclick="$(this).closest('form').submit()">Delete</a></div></div>
</div>

<div class="clearDiv"><hr></div>

</form>
</div> <!--Cart Con-->
<?php
}


} //if isset

else{
	echo '<div class="ticInner boldy">YOUR CART IS EMPTY</div>';
	$isEmpty=true;

}

	?>



           
                    
                                     
                                  
                                   
                    </div> <!--ticInner outside form-->

                </div>
            </div>
        </div>
    </div>
</div> <!-- ticket-->
<?php
if ($isEmpty==true) {
echo <<<"YOLO"
 <div class="checkOutDiv">
  <a class="cSubmit bookM" href="index.php?page=movie">BOOK MOVIE</a>  
  </div>
YOLO;
}else{
?>

<div class="cartFinal">
	<div class="<?php echo $visV; ?>">
<div class="grandL"><p>Grand Total: </p></div>
<div class="grandR"><p id="grandT">$ <?php echo number_format((float)$sumGT, 2, '.', ''); ?></p></div>
<div class="clearDiv"> </div>
</div>

<div class="<?php echo $visV; ?>">
<div class="grandL"><p>Voucher Used <span id="grandLV">(<?php echo $valV; ?>):</span></p></div>
<div class="grandR"><p id="discount">20%</p></div>
<div class="clearDiv"> </div>
</div>

<div class="grandCon">
<div class="grandL"><p id="totA">TOTAL AMOUNT DUE: </p></div>
<div class="grandR"><p id="amountDue">$ <?php 
if($useV==false){
echo number_format((float)$sumGT, 2, '.', ''); 
}
else{
	
	echo number_format((float)$sumGTD, 2, '.', '');
}
?></p></div>
<div class="clearDiv"> </div>
</div>


</div><!-- CART TOTAL-->
 <div class="cusVoucher">
 	<form action="index.php?page=cart#sVoucher" method="post">
 <?php echo $msgV?>
  <span for="cVoucher">Voucher:  </span>
  <input type="text" pattern="^([0-9]{5}-){2}[A-Z]{2}$" title="Voucher Code is Case Sensitive" id="cVoucher" onkeyup="chkHyphen(this,[5,11]);" name="cVoucher" class="cVoucher" placeholder="Input your voucher">
 <img id="loadingimg" src="img/loading.gif"/>
 <button type="submit" id="sVoucher" name="sVoucher">Apply</button>
  </form>
  </div>
<!-- <div class="clearDiv"></div> -->
<form action="check/validation.php" method="post">
  	<?php
  	$ticNumlong = md5(uniqid(rand(), true));
//with this substr, can't guarantee it'll be unique, can be prevent by match it with database first
	$randomNo=substr($ticNumlong, -5);
  	echo '<input type="hidden" name="valVoucher" value="'.$valV.'">
  	<input type="hidden" name="gTotal" value="'.$sumGT.'">
  	<input type="hidden" name="amountDue" value="'.$sumGTD.'">
<input type="hidden" name="orderNo" value="'.$randomNo.'">
  	';
    // echo $randomNo;
?>
  <div class="cartVoucher">


  <div class="customerCon">
    <div class="pleaseFill">Please Fill In Customer Details</div>
  
  <div class="cusName">
  	  <p id="msgName" class="validationMsg">Must Be Characters Only</p>
<label for="cName">Name:  </label><input type="text" oninput="checkStr()" id="cName" name="cName" class="cName" placeholder="Input your name" required>

  </div>

 <div class="cusMobile">
 	  <p id="msgMobile" class="validationMsg">Must be an Australian Mobile Number</p>
<label for="cMobile">Mobile:</label>
<input type="text" oninput="checkMob()" id="cMobile" name="cMobile" class="cMobile" pattern="^\(?(?:\+?61|0)4\)?(?:[ -]?[0-9]){7}[0-9]$" title="Must be Australian Mobile Number" placeholder="Input mobile number" required>
<input type="hidden" id="crMobile" name="crMobile" value="">
  </div>

 <div class="cusEmail">
 	  <p id="msgEmail" class="validationMsg">Please Enter a Valid Email Address</p>
<label for="cEmail">Email:  </label>
<input type="email" id="cEmail" name="cEmail" oninput="checkEmail()" pattern="^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$" class="cEmail" placeholder="Input your email" required>
  </div>


</div> <!-- END customerCon-->


</div> <!-- END cartVoucher-->


   <div class="checkOutDiv">
   	<!-- <form action="views/deleteCart.php" method="post" ajax="true" id="emptyCartForm"> -->
   		<!-- <input type="hidden" name="emptyCart" value="empty"> -->
  		<a class="cSubmit" href="check/deleteCart.php?cart=empty">EMPTY CART</a>
		</form>

<button type="submit" id="finalSubmit" name="finalSubmit" value="Checkout">Checkout</button>

  </div>
    </form>
<?php 
}
?>


<div class="clearDiv"> </div>
       </div>
     </div>
 
