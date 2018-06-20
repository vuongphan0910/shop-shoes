<?php if(isset($_SESSION['giohang'])){
	?>
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Đặt Hàng</h3>
				<div class="checkout-left">
					<div class="col-md-4 checkout-left-basket">
						<h4>Thông tin giỏ hàng</h4>
						<ul>
							<?php
							$k=count($_SESSION['giohang']); 
							$tongtien=0;
							$stt=0;for($i=0;$i<$k;$i++){
								$stt++;
								$tenSP= $_SESSION['giohang'][$i]['TenSP'];
								$sl= $_SESSION['giohang'][$i]['sl'];
								$giatien= $_SESSION['giohang'][$i]['gia'];
								$idSP= $_SESSION['giohang'][$i]['gia'];
								$tong=$sl*$giatien;
								?>
								<li><?=$sl." ".$tenSP?><i> :</i> <span><?=number_format($tong,0,',','.')." VNĐ";$tongtien+=$tong;?></span></li>
							<?php } ?>
							<li class="total">Tổng cộng: <i></i> <span>
								<?=number_format($tongtien,0,',','.')." VNĐ"; 
								$_SESSION['DonHang']['tongtien']=$tongtien;
								?></span></li>
							</ul>
						</div>
						<div class="col-md-8 address_form">
							<h2>Thông Tin Giao Hàng</h2>
							<form action="thanh-toan/" method="post" class="creditly-card-form agileinfo_form">
								<section class="creditly-wrapper wrapper">
									<div class="information-wrapper">
										<div class="first-row form-group">
											<div class="controls">
												<label class="control-label">Họ Tên: </label>
												<input class="billing-address-name form-control" type="text" name="hoten" placeholder="Full name" required>
											</div>
											<div class="card_number_grids">
												<div class="card_number_grid_left">
													<div class="controls">
														<label class="control-label">Email:</label>
														<input class="form-control" type="text" placeholder="Nhập Email" name="email" required>
													</div>
												</div>

												<div class="clear"> </div>
											</div>
											<div class="controls">
												<label class="control-label">SĐT: </label>
												<input class="form-control" type="text" placeholder="Nhập SĐT" name="sdt" required>
											</div>
											<div class="controls">
												<label class="control-label">Địa Chỉ Nhận Hàng: </label>
												<input class="form-control" type="text" placeholder="Nhập Địa Chỉ" name="diachi" required>
											</div>
											<div class="controls">
												<label class="control-label">Phương Thức Giao Hàng: </label>
												<select class="form-control option-w3ls" style="padding: 0em 1em 0em 1em;" name="delivery">
													<option value="tructiep">Giao Hàng Tận Nhà</option>
												</select>
											</div>
										</div>
									</div>
								</section>
								<div class="checkout-right-basket">
									<input type="submit" name="thanhtoan" value="Thanh Toán" class="btn btn-primary submit"></a>
								</div>
							</form>
						</div>
						<div class="clearfix"> </div>
						<div class="clearfix"></div>
					</div> 
				</div>
			</div>
		</div>
	<?php } else include"404.php"; ?>
