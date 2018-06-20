<?php 
require_once "libraries/classSP.php";
$sp=new sp;
if(isset($_GET['idCLa']));
$idCLa=$_GET['idCLa'];
$TenLoai=$_GET['TenLoai'];
$idLoai=$sp->LayidLoai($TenLoai);
if(isset($_GET['page']))
	$page=$_GET['page'];
else 
	$page=1;
settype($page,"int");
if($page<=0)
{
	$page=1;
}
$limit=6;
$listSP=$sp->ListTin_TrongLoai($idCLa,$idLoai,$page,$limit,$tongdong);
?>
<div class="ads-grid_shop">
	<div class="shop_inner_inf">
		<div>
			<h3 class="title_shop"> <a href="index.php">Trang Chủ</a> / <a href="home.php">Shop</a> </h3>
		</div>
		<?php include "shop_left.php"; ?>
		<div class="left-ads-display col-md-9">
			<div class="wrapper_top_shop">
				<div class="col-md-6 shop_left">
				</div>
				<div class="col-md-6 shop_right"></div>
				<div class="clearfix"></div>
				<?php  include "list_product.php"; ?>
				<div class="slideInLeft animated" align="center"><?php  echo  $sp->Phantrang("cat/$idCLa/$TenLoai",$tongdong,$page,$limit,3);?></div>
				<div class="clearfix"></div>
				<!-- //product-sec1 -->
				<div class="col-md-6 shop_left shp">
					<img src="images/banner4.jpg" alt="">
					<h6>21% off</h6>
				</div>
				<div class="col-md-6 shop_right shp">
					<img src="images/banner1.jpg" alt="">
					<h6>31% off</h6>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>