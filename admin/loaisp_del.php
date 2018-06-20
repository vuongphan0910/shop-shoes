<?php 
	require_once "../libraries/classquantritin.php";
    $qt=new quantritin;
    $qt->checkLogin(); 
    $idLoai=$_GET['idLoai'];
    $kq=$qt->Delete_LoaiSP($idLoai);
    header("location:index.php?p=loaisp_list")
?>