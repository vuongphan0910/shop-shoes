<?php
require_once "../libraries/classquantritin.php";
$qt=new quantritin;
if(isset($_POST['idSP']))
$idSP=$_POST['idSP'];
if(isset($_GET['file']))
$num=$_GET['file'];
if(isset($_POST['ok_upload'])){
$qt->Upload($num,$idSP);
?>