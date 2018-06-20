<?php 
include "../libraries/classquantritin.php";
$qt=new quantritin;
$Ten=$_GET['TenLoai'];
$idCL=$_GET['idCL'];
if($Ten==NULL){
	echo 'Vui Lòng Nhập Tên Loại Tin';
}
else if($qt->CheckLoaiSP($Ten,$idCL)==false){
	echo 'Tên Loại Tin Đã Tồn Tại';
}
?>