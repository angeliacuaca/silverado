<?php

if (!isset($_SESSION)) session_start();
// echo urlencode($_SESSION['user']['email']);
// echo "<pre>";
// 				print_r($_SESSION['user']);
// 				echo "</pre>";

$errorMes="";
if(isset($_GET['email'])&&isset($_GET['token'])){

$inEmail=$_GET['email'];
$inPass=$_GET['token'];



$jsonDB=file_get_contents('../check/receipts.json');
$userDB=json_decode($jsonDB);

for ($i=0; $i <count($userDB) ; $i++) { 
$user=$userDB[$i];

	if($inPass==$user->{'order-no'}){
			
			if($inEmail==$user->email){
unset($_SESSION['user']);
			$_SESSION['user']['name']=$user->name;
			$_SESSION['user']['email']=$user->email;
			$_SESSION['user']['mobile']=$user->mobile;
			$_SESSION['user']['cart']=$user->cart;
			$_SESSION['user']['total']=$user->total;
			$_SESSION['user']['voucher']=$user->voucher;
			$_SESSION['user']['grand-total']=$user->{'grand-total'};
			$_SESSION['user']['order-no']=$user->{'order-no'};

				$errorMes="correct!";
header("Location: ../index.php?page=ticket&email=".urlencode($_SESSION['user']['email'])."&token=".$_SESSION['user']['order-no']);
				
				
			}else{ $errorMes="There's no such email";
header("Location: ../index.php?page=ticket&error=true");

			}
break;
	}else{ $errorMes="Wrong Password"; 
header("Location: ../index.php?page=ticket&error=true");
}


}

// header("Location: ../index.php?page=ticket");
} //isset GET

?>

 