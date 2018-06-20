<div class="left-ads-display col-md-9">
	<div class="wrapper_top_shop">
		<div class="col-md-6 shop_left">			 
			<h3 style="margin-top: 5px; color: red">Sản Phẩm Mới</h3>
		</div>
		<div class="col-md-6 shop_right">
		</div>
		<div class="clearfix"></div>
		<?php
		$listSP=$sp->SP_new(12);
		include "list_product.php"; ?>
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
		<div class="col-md-6 shop_left">
			<h3 style="margin-top: 5px; color: red">Sản Phẩm Bán Chạy</h3>
		</div>
		<div class="col-md-6 shop_right">
		</div>
		<div class="clearfix"></div>
		<?php 
		$listSP=$sp->SP_BanChay(12);
		include "list_product.php"; ?>
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