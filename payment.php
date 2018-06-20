<?php 
if(isset($_POST['hoten']))
	$_SESSION['DonHang']['hoten']=$_POST['hoten'];
if(isset($_POST['diachi']))
	$_SESSION['DonHang']['diachi']=$_POST['diachi'];
if(isset($_POST['email']))
	$_SESSION['DonHang']['email']=$_POST['email'];
if(isset($_POST['sdt']))
	$_SESSION['DonHang']['sdt']=$_POST['sdt'];
if(isset($_POST['delivery']))
	$_SESSION['DonHang']['delivery']=$_POST['delivery'];	 
?>
<div class="ads-grid_shop">
	<div class="shop_inner_inf">
		<div class="privacy about">
			<h3>Pay<span>ment</span></h3>
			<!--/tabs-->
			<div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">							
						<li>Phương Thức Thanh Toán</li>
					</ul>
					<div class="resp-tabs-container">						
						<div class="tab4">
							<div class="pay_info">
								<form class="cc-form" action="hoan-tat/" method="post">
									<div class="col-md-12">

										<div class="check_box_one cashon_delivery">
											<label class="anim">
												<input type="radio" class="checkbox" name="payment" value="cod" checked"">
												<span>Thanh Toán Khi Giao Hàng</span> 
											</label>
										</div>
										<div class="check_box_one cashon_delivery">
											<label class="anim">
												<input type="radio" class="checkbox" name="payment" value="ck" required 	>
												<span>Chuyển Khoản Qua TK Ngân Hàng VCB</span>
												<p>Chủ TK :Phan Quốc Vương</p>
												<p>Card Number: 0123 456 789</p>
												<p>Chi Nhánh : Ngân Hàng VCB Chi Nhánh Đông Nam</p>	
											</label>
										</div>
									</div>										
									<input class="btn btn-primary submit" type="submit" value="Quay Lại" style="float: left;">
									<input class="btn btn-primary submit" type="submit" value="Hoàn Tất" style="float: right;">
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--//tabs-->
	</div>
</div>
<!-- //payment -->
<div class="clearfix"></div>
</div>