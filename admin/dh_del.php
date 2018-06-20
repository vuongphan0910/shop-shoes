<?php 
	if(isset($_GET['idDH']))
	$idDH=$_GET['idDH'];
	$qt->DH_delete($idDH);
	header("location:index.php?p=dh_list")
?>