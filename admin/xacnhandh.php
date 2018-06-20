<?php 
require_once "../libraries/classquantritin.php";
$qt=new quantritin;
$idDH=$_GET['idDH'];
echo $qt->DH_xacnhan($idDH);
?>