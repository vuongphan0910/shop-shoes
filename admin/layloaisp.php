<?php 
include "../libraries/classquantritin.php";
$qt=new quantritin;
$rowLSP=null;
if(isset($_GET['idCL']))
	$idCL=$_GET['idCL'];
$listLSP=$qt->LoaiTrongCL($idCL);
?>
	<select class="form-control show-tick" name="idLoaiSP">
		<?php while($rowLSP=$listLSP->fetch_array()) { ?>
			<option value="<?=$rowLSP['idLoai']?>" ><?=$rowLSP['TenLoai']?></option>
		<?php }?>
	</select>
<?=$rowLSP['idLoai']==$rowSP['idLoai']?'selected':''?>