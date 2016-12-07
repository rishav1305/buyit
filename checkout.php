<?php session_start();
	if (!isset($_SESSION['UserName'])) {
		include("login.php");
	}
	else{
		include("payment.php");
	}
?>
