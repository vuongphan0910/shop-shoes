<div class="product-sec1">
	<?php while ($rowSP=$listSP->fetch_array()){ ?>
		<div class="col-md-4 product-men ">				
			<div class="product-shoe-info shoe">
				<div class="men-pro-item">
					<div class="men-thumb-item">
						<img src="<?="upload/hinhchinh/".$rowSP['urlHinh']?>" alt="">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="san-pham/<?=$rowSP['idSP']?>.html" class="link-product-add-cart">Chi Tiết</a>
							</div>
						</div>
						<span class="product-new-top">New</span> 
					</div>
					<div class="item-info-product">
						<h4>
							<a href="san-pham/<?=$rowSP['idSP']?>.html"><?=$rowSP['TenSP']?></a>
						</h4>
						<div class="info-product-price">
							<div class="grid_meta">
								<div class="product_price">
									<div class="grid-price ">
										<span class="money "><?=number_format($rowSP['Gia'],0,",",".")." VNĐ"?></span>
									</div>
								</div>
								<ul class="stars">
									<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								</ul>
							</div>
							<div class="shoe single-item hvr-outline-out">
								<a href="submit_cart.php?action=add&idSP=<?=$rowSP['idSP']?>"><button type="submit" class="shoe-cart pshoe-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button></a>
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="shoe_item" value="Bella Toes">
									<input type="hidden" name="amount" value="675.00">
									<a href="#" data-toggle="modal" data-target="#myModal1"></a>
								</form>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="clearfix"></div>
</div>

