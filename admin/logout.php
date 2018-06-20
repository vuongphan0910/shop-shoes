<?php 
	session_start();
	session_destroy();
	setcookie("id",$_SESSION['login_id'],time()-1);
	header('location:login.php');
?>