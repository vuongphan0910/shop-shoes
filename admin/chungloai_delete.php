<?php 
    $qt->checkLogin(); 
    $idCL=$_GET['idCL'];
    settype($idCL,"int");
    $kq=$qt->Delete_CL($idCL);
    header("location:index.php?p=chungloai_list");
?>