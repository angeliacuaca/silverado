<?php
if (!isset($_SESSION)) session_start();
if(empty($_SESSION['cart'])){
	$_SESSION['cart']=array();
}



if(isset($_POST['movID'])){

 $movID = $_POST['movID'];
  $movTitle = $_POST['movTitle'];
  $movGenre =  $_POST['movGenre'];
  $movPoster =  $_POST['movPoster'];
  $movTime = strtoupper($_POST['movTime']);
  $movDay = $_POST['movDay'];
  $clientPrice = $_POST['movPrice'];
  $cheap=$_POST['cheap'];
  $movPrice=array();


  
//quantity
$seats=array(
  "SA" => $_POST['SA'],
  "SP" => $_POST['SP'],
  "SC" => $_POST['SC'],
  "FA" =>  $_POST['FA'],
  "FC" =>  $_POST['FC'],
  "B1" =>  $_POST['B1'],
  "B2" =>  $_POST['B2'],
  "B3" =>  $_POST['B3'],
);
foreach ($seats as $seatID => $seatQ) {
						if ($cheap=='false') {
						switch ($seatID) {
							case 'SA':
							$seatType="Adult";
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
						
					  }else{
					switch ($seatID) {
							case 'SA':
							$seatType="Adult";
								$price=12;
								break;
							case 'SP':
							$seatType="Concession";
								$price=10;
								break;	
							case 'SC':
							$seatType="Children";
								$price=8;
								break;
							case 'FA':
							$seatType="First Class Adult";
								$price=25;
								break;
							case 'FC':
							$seatType="First Class Children";
								$price=20;
								break;
							case 'B1':
							$seatType="Beanbag 1 Person";
								$price=20;
								break;
							case 'B2':
							$seatType="Beanbag 2 People";
								$price=20;
								break;
							case 'B3':
							$seatType="Beanbag 3 Children";
								$price=20;
								break;									
							default:
								$price=0;
								break;
						}
					  }

if($seatQ != 0){



array_push($movPrice, $seatQ*$price);
$seatArray[$seatID]=array(
"quantity" => $seatQ,
"price" => $price,
"seats" => array(),
);

$alp = range('E', 'H'); 
$numSA=array("01","02","03","04","05","06","07","08","09","10","11","12","13","14");
$beanB=array("A01","A02","B01","B02","B03","C01","C02","C03","C04","D01","D02","D03","D04");



for ($i=0; $i <$seatQ ; $i++) { 

	$randSA=array_rand($numSA,14);
$randAlp=array_rand($alp,4);
$randB=array_rand($beanB,13);

$rangeA=array_rand(range(1,4));
$rangeB=array_rand(range(1,13));
$rangeN=array_rand(range(1,14));

	if($seatID=="B1"||$seatID=="B2"||$seatID=="B3"){
		$addSeats= $beanB[$randB[$rangeB]];
	array_push($seatArray[$seatID]['seats'],$addSeats);
}
		else{
			$addSeats=$alp[$randAlp[$rangeA]].$numSA[$randSA[$rangeN]];
			// echo $alp[$randAlp[$rangeA]].$numSA[$randSA[$rangeN]];
		 array_push($seatArray[$seatID]['seats'],$alp[$randAlp[$rangeA]].$numSA[$randSA[$rangeN]]);
		}

}


}

} //end foreach
// var_dump($cartItem);

}

//else no movID
else{
	echo "invalid page";
}

  //total price calculate from server
$subTotal=array_sum($movPrice);


 if($clientPrice==$subTotal){
echo nl2br("\n Server: ".$subTotal. "\n");
}
	else{
echo nl2br("\n Please update price \n");
}


  // $seatArray=array();
  $addScreen=array(
"movie" => $movTitle,
"day" => $movDay,
"time" => $movTime,
"seats" =>$seatArray,
"sub-total" =>$subTotal,
  	);


if (isset($_SESSION['cart']["Screenings"])) {
	$preExist=false;
for ($a=0; $a <count($_SESSION['cart']["Screenings"]); $a++) {

	if($_SESSION['cart']["Screenings"][$a]["movie"]==$movTitle
		&& $_SESSION['cart']["Screenings"][$a]["day"]==$movDay
		&& $_SESSION['cart']["Screenings"][$a]["time"]==$movTime){
$_SESSION['cart']["Screenings"][$a]=$addScreen;
// $add="do not add";
$preExist=true;
	}
else{
// $add="added ".$movTitle.$movDay.$movTime; 
}

}
if($preExist==false){
	
	// echo $add;
	$_SESSION['cart']["Screenings"][]=$addScreen;
}
else{
	// echo "updated ".$movTitle.$movDay.$movTime;
}


}


else{
	$_SESSION['cart']["Screenings"][]=$addScreen;
}



// array_push($_SESSION['cart']['Screenings'], $addScreen);

// echo '<pre>';
// print_r($_SESSION['cart']);
// $json = json_decode($addThis);
// print_r($json);
// echo '</pre>';

// header("Location: ".$_SERVER['HTTP_REFERER']);
if(isset($_POST['btnCon'])){
header("Location: ../index.php?page=cart");
exit();

}else{
header("Location: ../index.php?page=movie");
exit();
}
// $_SESSION['previous']="addCart";
?>
