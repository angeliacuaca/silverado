<!--page idea and layout from http://jsfiddle.net/mturjak/2wk6Q/1949/-->
<?php
if (!isset($_SESSION)) session_start();

if(!isset($_SESSION['user'])){
	header("Location: index.php");
}else{

$btnTics=true;
$uNA=$_SESSION['user']['name'];
$uEM=$_SESSION['user']['email'];
$uMO=$_SESSION['user']['mobile'];
$uCA=$_SESSION['user']['cart'];
$uTO=$_SESSION['user']['total'];
$uVO=$_SESSION['user']['voucher'];
$uGT=$_SESSION['user']['grand-total'];
$orderNo=$_SESSION['user']['order-no'];

$reMO= preg_replace("/^(\d{4})(\d{3})(\d{3})$/", "$1 $2 $3", $uMO);
$reVO=str_replace("No Voucher", "Not Applicable", $uVO);
// echo "<pre>";
// 				print_r($_SESSION['user']);
// 				echo "</pre>";

$jsonDB=file_get_contents('check/receipts.json');
$userDB=json_decode($jsonDB,true);

for ($i=0; $i <count($userDB) ; $i++) { 
$user=$userDB[$i];

	if($user['order-no']==$orderNo){
			
			if($user['email']==$uEM){
//grab user index from db
			$index=$i;	
			}else{ $errorMes="There's no such email"; }
break;
	}else{ $errorMes="Wrong Password"; }


}
//for loop end









} //user exist END

?>
<div class="page">
<div class="subpage">
	<div class="ticMenu">
<a id="tPrint" href="views/print.php" target="_blank"><img src="img/icon/print-blue.png"></a>
<a id="tView" href="index.php?page=ticket&action=view"><img src="img/icon/ticket-blue.png"></a>
<a id="vRec" href="index.php?page=ticket&action=receipt"><img src="img/icon/receipt-blue.png"></a>
</div>
<div class="ticInfos">
<h3>Tickets</h3><p>Please present this ticket to our staff.<br>Ticket will not be valid until the payment clear.<br>Contact our front desk for more information.</p>
</div>

<?php


// echo "<pre>";
// print_r($userDB[6]['cart']['Screenings'][0]['seats']['SC']['seats']);
// echo "</pre>";
// echo $index;
$screens=$userDB[$index]['cart']['Screenings'];

for($x=0;$x<count($screens);$x++){
	$movie=$screens[$x]['movie'];
	$day=$screens[$x]['day'];
	$time=$screens[$x]['time'];

// if($btnTics==true){
?>

<div class="Title" id="tics">
	<?php echo "<a class='schBtn' href='index.php?page=ticket&action=view&movie=".urlencode($movie)."&day=".urlencode($day)."&time=".urlencode($time)."#tics'><p>".strtoupper($movie)."<p>".strtoupper($day." ".$time)."</p></a>"; ?>

</div>

<?php
// }

foreach ($userDB[$index]['cart']['Screenings'][$x]['seats'] as $seatID => $seats) {
		switch ($seatID) {
			case 'SA':
			$seatType="Standard Adult";
				$price=18;
				break;
			case 'SP':
			$seatType="Concession";
				$price=15;
				break;	
			case 'SC':
			$seatType="Children";
				$price=12;
				break;
			case 'FA':
			$seatType="First Class Adult";
				$price=30;
				break;
			case 'FC':
			$seatType="First Class Children";
				$price=25;
				break;
			case 'B1':
			$seatType="Beanbag 1 Person";
				$price=30;
				break;
			case 'B2':
			$seatType="Beanbag 2 People";
				$price=30;
				break;
			case 'B3':
			$seatType="Beanbag 3 Children";
				$price=30;
				break;									
			default:
				$price=0;
				break;
		}

					$ticQ=$seats['quantity'];
					$ticP=$seats['price'];
					if($price!=$ticP){
						$deal=" (deal)";}
						else{$deal="";}
					$ticSeats=$seats['seats'];

						
					for ($i=0; $i <count($seats['seats']) ; $i++) { 
					

?>
<!-- loop START -->
<?php
if(isset($_GET['movie'])&&isset($_GET['day'])&&isset($_GET['time'])){
$getMovie=urldecode($_GET['movie']);
$getDay=urldecode($_GET['day']);
$getTime=urldecode($_GET['time']);
$btnTics=false; 

// echo $btnTics; 
// echo $getMovie;  

if($movie==$getMovie && $day==$getDay && $time==$getTime)
{

	$movie=$getMovie;
	$day=$getDay;
	$time=$getTime;
?>
<div class="tics">



<!-- <div class="logo"><img src="../img/logo.png" alt="Silverado"> </div> -->
<div class="QR">
<div class="QRtop">
	<div class="movInfo">

<!-- <div class="Titled"><p><?php echo $movie ." </p><p>".strtoupper($day." ".$time); ?></p></div> -->

<div class="seat"><p><?php echo $seatType; ?></p></div>
<div class="seat"><?php echo "<p>Seat: ".$ticSeats[$i]; ?></p></div>
</div> </div>

<div class="QRcode"><img src='https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=<?php  echo strtolower($orderNo.$seatID.$ticSeats[$i]); ?>'></div>
<!-- <div class="QRbot"><?php echo strtolower($orderNo.$seatID.$ticSeats[$i]); ?></div> -->
</div>
       	
</div>

<?php

	// break;
}



?>


 	

<!-- loop END -->
<?php
}
					}
echo "<div class='clearDiv'><hr></div>";

	  }
}

?>
</div>
</div> 
