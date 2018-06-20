<?php if(isset($_GET['idSP']))
$idSP=$_GET['idSP'];
$result=$sp->Detail_SP($idSP);
$rowSP=$result->fetch_array();
$TenSP=$rowSP['TenSP'];
$kq=$sp->IMG_SP($idSP);
if(isset($_POST['btn_bl']))
{
	$idSP=$_POST['idSP'];
	$sp->add_bl($idSP);
	header("location:$idSP.html");
}
?>
<div class="ads-grid_shop">
	<div class="shop_inner_inf">
		<div>
			<h3 class="title_shop"> <a href="index.html">Trang Chủ</a> / <a href="home.html">Shop</a> / Chi Tiết Sản Phẩm </h3>
			<hr/>
		</div>
		<div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<ul class="slides">
						<?php while ($rowIMG=$kq->fetch_array()) {
							?>
							<li data-thumb="<?="upload/hinhphu/".$rowIMG['urlHinh']?>">
								<div class="thumb-image"> <img src="<?="upload/hinhphu/".$rowIMG['urlHinh']?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						<?php } ?>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<form action="submit_cart.php" method="get" accept-charset="utf-8">
			<div class="col-md-8 single-right-left simpleCart_shelfItem">
				<h3><?=$rowSP['TenSP']?></h3>
				<p><span class="item_price">Giá :<?=number_format($rowSP['Gia'],0,",",".")." VNĐ"?></span>
				</p>
				<div class="rating1">
					<ul class="stars">
						<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
					</ul>
				</div> 
				<div class="color-quality">
					<div class="color-quality-right">
						<h5>Size :</h5>
						<?php $size=$sp->Size_SP($TenSP); ?>
						<select id="size" name="size" onchange="change_country(this.value)" class="frm-field required sect">
							<?php while ($rowSize=$size->fetch_array()) {
								?>
								<option value="<?=$rowSize['Size']?>"><?=$rowSize['Size']?></option>
							<?php } ?>					
						</select>
					</div>
				</div>
				<div class="occasional">
					<h5>Số Lượng:</h5>
					<input type="number" name="sl" min="1" value="1">
				</div>
				<input type="hidden" name="idSP" value="<?=$rowSP['idSP']?>">
				<input type="hidden" name="action" value="add">
				<input type="submit" name="submit" value="Add to cart" class="button add">
			</form>
			<div class="occasion-cart">
				<div class="shoe single-item single_page_b">
					<form>
					</form>
				</div>
			</div> 
			<ul class="social-nav model-3d-0 footer-social social single_page">
				<li class="share">Share On : </li>
				<li>
					<a href="#" class="facebook">
						<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
					</a>
				</li>
				<li>
					<a href="#" class="twitter">
						<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
					</a>
				</li>
				<li>
					<a href="#" class="instagram">
						<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
					</a>
				</li>
				<li>
					<a href="#" class="pinterest">
						<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
					</a>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
		<!--/tabs-->
		<div class="responsive_tabs">
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li>Thông Tin Sản Phẩm</li>
					<li>Bình Luận</li>
				</ul>
				<div class="resp-tabs-container">
					<!--/tab_one-->
					<div class="tab1">
						<div class="single_page">
							<h6><?=$rowSP['TenSP']?></h6>
							<p>
								<?=$rowSP['baiviet']?>
							</p>
						</div>
					</div>
					<!--//tab_one-->
					<div class="tab2">
						<?php $kq=$sp->Lay_BL($idSP);
						?>
						<div class="single_page">
							<div class="bootstrap-tab-text-grids">
								<div class="bootstrap-tab-text-grid">
									<div class="bootstrap-tab-text-grid">
										<?php while ($rowBL=$kq->fetch_array()) {
											?>
											<ul>
												<li> <a><?=$rowBL['hoten']?></a> (<?=$rowBL['ngay_comment']?>) :</li>
												<!-- <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li> -->
											</ul>
											<p>- <?=$rowBL['noidung']?></p>
										<?php } ?>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="add-review">
									<h4>add a review</h4>
									<form action="" method="post">
										<input type="text" name="hoten" required="Name" placeholder="Nhập Tên">
										<input type="email" name="Email" required="Email" placeholder="Nhập Email" >
										<input type="hidden" name="idSP" value="<?=$rowSP['idSP']?>">
										<textarea name="noidung" required="" placeholder="Nội Dung"></textarea>
										<input type="submit" value="SEND" name="btn_bl">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--//tabs-->
		<!-- /new_arrivals -->
		<div class="new_arrivals">
			<h3>Sản Phẩm Liên Quan</h3>
			<!-- /womens -->
			<?php 
			$idLoai=$rowSP['idLoai'];
			$kq=$sp->SP_LQ($idLoai);
			while($r=$kq->fetch_array()){
				?>
				<div class="col-md-3 product-men women_two">
					<div class="product-shoe-info shoe">
						<div class="men-pro-item">
							<div class="men-thumb-item">
								<img src="upload/hinhchinh/<?=$r['urlHinh']?>" alt="">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="san-pham/<?=$r['idSP']?>.html" class="link-product-add-cart">Chi Tiết</a>
									</div>
								</div>
								<span class="product-new-top">New</span>
							</div>
							<div class="item-info-product">
								<h4>
									<a href="san-pham/<?=$r['idSP']?>.html"><?=$r['TenSP']?></a>
								</h4>
								<div class="info-product-price">
									<div class="grid_meta">
										<div class="product_price">
											<div class="grid-price ">
												<span class="money ">
													<?=number_format($r['Gia'],0,",",".")." VNĐ"?></span>
												</div>
											</div>
											<ul class="stars">
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
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
				<!-- //womens -->
				<div class="clearfix"></div>
			</div>
			<!--//new_arrivals-->
		</div>
	</div>