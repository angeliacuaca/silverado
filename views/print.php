<!--page idea and layout from http://jsfiddle.net/mturjak/2wk6Q/1949/-->
<?php
if (!isset($_SESSION)) session_start();

if(!isset($_SESSION['user'])){
	header("Location: ../index.php");
}else{


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

$jsonDB=file_get_contents('../check/receipts.json');
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
<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1" name="viewport"></meta>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"></meta>
<link rel="stylesheet" href="../css/print.css" />
<script src="../js/print.js" /></script>
<script src="../js/jquery.min.js"></script>

<title>Silverado Receipt</title>
</head>

<body onload="printThis()">
<div class="book">
<div class="page">
<div class="subpage">
<?php


// echo "<pre>";
// print_r($userDB[6]['cart']['Screenings'][0]['seats']['SC']['seats']);
// echo "</pre>";
// echo $index;
$screens=$userDB[$index]['cart']['Screenings'];
$rec=true;
$page=1;
$break="";
$con=0;
for($x=0;$x<count($screens);$x++){
	$movie=$screens[$x]['movie'];
	$day=$screens[$x]['day'];
	$time=$screens[$x]['time'];

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

					if($rec==true){
						$rec=false;
						$con=$con+1;
?>
<div class="rec">
<div class="logo"><img src="../img/logo.png" alt="Silverado"> </div>
<div class="QR">
<div class="QRtop"><h3>Reservation Receipt</h3><p>Ticket must be paid over counter in order to activate the barcode</p></div>
<div class="QRcode"><img src='https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=<?php echo $orderNo; ?>'></div>
</div>

	<?php 
	$uGT=number_format((float)$uGT, 2, '.', ''); 
	echo <<<YOLO
	<div class="info">
	$uNA<br>
	$uEM<br>
	$reMO<br>
	Order No: $orderNo<br>
	Voucher No: $reVO<br>
	Amount Due:<p>\$$uGT</p>
	</div>   
YOLO;
	?>

</div>
 	<div class="clearDiv"><hr></div>

<?php							
						
						}
						
					for ($i=0; $i <count($seats['seats']) ; $i++) { 

						// echo "<pre>";
						// echo "page".$page." ";
						// echo $ticSeats[$i];
						// echo "</pre>";
						$con=$con+1;

						if($con>=3){
							$page=$page+1;
							$con=0;
							$break='</div></div><div class="page"><div class="subpage">';
						}else{
							$break="";
						}

?>
<!-- loop START -->
       

<div class="tics">
<div class="logo"><img src="../img/logo.png" alt="Silverado"> </div>
<div class="QR">
<div class="QRtop"><h3>This is Your Ticket</h3><p>Please present this ticket to our staff.<br>Ticket will not be valid until the payment clear.<br>Contact our front desk for more information.</p></div>
<div class="QRcode"><img src='https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=<?php  echo strtolower($orderNo.$seatID.$ticSeats[$i]); ?>'></div>
<div class="QRbot"><?php echo strtolower($orderNo.$seatID.$ticSeats[$i]); ?></div>
</div>
<div class="movInfo">
<div class="Title">Screening:<p><?php echo $movie; ?></p></div>
<div class="Title">Session:<p><?php echo strtoupper($day." ".$time); ?></p></div>
<div class="Title">Admission:<div class="seat">Seat:<p><?php echo $ticSeats[$i]; ?></p></div><p><?php echo $seatType.$deal; ?></p></div>
</div>        	
</div>
 	

<!-- loop END -->
<?php
if ($break=="") {
echo '<div class="clearDiv"><hr></div>';
}
echo $break;

					}

	  }
}

?>

</div> 
</div><!--END PAGE-->

</div>
</body>
</html>