<?php
if (!isset($_SESSION)) session_start();
if(empty($_SESSION['user'])){
	$_SESSION['user']=array();
}

if(isset($_POST['cEmail'])){
if(isset($_SESSION['cart'])){

$testArray=array();

	$cEmail=$_POST['cEmail'];
	$cName=$_POST['cName'];
	$cMobile=$_POST['crMobile'];
	$cVoucher=$_POST['valVoucher'];
	$cTotal=$_POST['gTotal'];
	$cGrandTotal=$_POST['amountDue'];
$orderNo=$_POST['orderNo'];

// echo $cEmail.$cName.$cMobile.$cVoucher.$cTotal.$cGrandTotal.$orderNo;
$testArray['name']=$cName;
$testArray['email']=$cEmail;
$testArray['mobile']=$cMobile;
$testArray['cart']=$_SESSION['cart'];
$testArray['total']=$cTotal;
$testArray['voucher']=$cVoucher;
$testArray['grand-total']=$cGrandTotal;
$testArray['order-no']=$orderNo;

echo "<pre>";
				print_r($testArray);
				echo "</pre>";

$temp=array();


echo '<pre>';
$previousAr=file_get_contents('receipts.json');
$decode=json_decode($previousAr);
// print_r($decode);

if($previousAr==""){
	array_push($temp, $testArray);
file_put_contents('receipts.json', json_encode($temp));
// print_r($temp);

}else{
	array_push($temp, $testArray);
	$merged=array_merge($decode,$temp);
// print_r($merged);
	$encode=json_encode($merged);
file_put_contents('receipts.json', $encode);
}

echo '</pre>';


unset($temp);
//unset cart
//set session user
$_SESSION['user']['name']=$cName;
$_SESSION['user']['email']=$cEmail;
$_SESSION['user']['mobile']=$cMobile;
$_SESSION['user']['cart']=$_SESSION['cart'];
$_SESSION['user']['total']=$cTotal;
$_SESSION['user']['voucher']=$cVoucher;
$_SESSION['user']['grand-total']=$cGrandTotal;
$_SESSION['user']['order-no']=$orderNo;

unset($_SESSION['cart']);

header("Location: ../index.php?page=ticket&email=".urlencode($_SESSION['user']['email'])."&token=".$_SESSION['user']['order-no']);

exit();

}
else{echo "Your cart is empty, how did you ended up here?";}
}
else{
	echo "You've come to wrong neighbourhood buddy";
}



?>