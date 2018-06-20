<?php 
include "../libraries/classquantritin.php";
$qt=new quantritin;
$rowLSP=null;
if(isset($_GET['idCL']))
	$idCL=$_GET['idCL'];
if(isset($_GET['idSP']))
	$idSP=$_GET['idSP'];
$kq=$qt->Detail_SP($idSP);
$rowSP=$kq->fetch_array();
$listLSP=$qt->LoaiTrongCL($idCL);
?>
<select class="form-control show-tick" name="idLoaiSP">
	<?php while($rowLSP=$listLSP->fetch_array()) { ?>
		<option value="<?=$rowLSP['idLoai']?>" <?=$rowLSP['idLoai']==$rowSP['idLoai']?'selected':''?> ><?=$rowLSP['TenLoai']?></option>
	<?php }?>
</select>

