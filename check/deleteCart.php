<?php
if (!isset($_SESSION)) session_start();
if(isset($_POST['deleteCart'])){
	$item=$_POST['deleteCart'];
	if(count($_SESSION['cart']['Screenings'])==1){
unset($_SESSION['cart']);
	}
	else{
		unset($_SESSION['cart']['Screenings'][$item]);
	$_SESSION['cart']['Screenings']=array_values($_SESSION['cart']['Screenings']);
		}
}

if(isset($_GET['cart'])){
	unset($_SESSION['cart']);
	header("Location: ../index.php?page=cart");
	exit();
}

?>