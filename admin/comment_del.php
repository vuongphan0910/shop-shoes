<?php 
	if(isset($_GET['idCM']))
	$idCM=$_GET['idCM'];
	$qt->BL_del($idCM);
	header("location:index.php?p=comment")
?>