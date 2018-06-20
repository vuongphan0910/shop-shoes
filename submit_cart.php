<?php
session_start();
require_once "libraries/classSP.php";
$sp=new sp;
if(!isset($_SESSION['giohang']))
	$_SESSION['giohang']=array();
if(isset($_GET['action'])){
	$action=$_GET['action'];}
	else echo "Khong biet lamg gi";	
	if(isset($_GET['idSP']))
		$idSP=$_GET['idSP'];	
	else
		echo "Vui Long chon san pham";		
	$sp->Cart($action,$idSP);
	header("location:gio-hang/");
	?>