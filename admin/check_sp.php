<?php 
include "../libraries/classquantritin.php";
$qt=new quantritin;
$TenSP=$_GET['TenSP'];
$size=$_GET['size'];
if($TenSP==NULL){
	echo 'Vui Lòng Nhập Tên Sản Phẩm';
}
else if($size==NULL){
	echo 'Vui Lòng Nhập Size';
}
else if($qt->Check_SP($TenSP,$size)==false){
	echo 'Sản Phẩm Đã Tồn Tại';
}
?>