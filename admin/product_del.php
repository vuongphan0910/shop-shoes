<?php 
	require_once "../libraries/classquantritin.php";
    $qt=new quantritin;
    $qt->checkLogin(); 
    $idSP=$_GET['idSP'];
    settype($idSP,"int");
    $kq=$qt->Product_del($idSP);
    header("location:index.php?p=pro_list");
?>