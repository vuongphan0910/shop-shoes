<?php 
include "../libraries/classquantritin.php";
$qt=new quantritin;
$TenCL=$_GET['TenCL'];
if($TenCL==NULL){
	echo '<b>Vui Lòng Nhập Tên Thể Loại</b>';
}
else if($qt->CheckChungLoai($TenCL)==false){
	echo '<b>Tên Thể Loại Đã Tồn Tại</b>';
}
?>