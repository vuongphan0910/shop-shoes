 <?php 
 if(isset($_SESSION['DonHang'])){ 
 	if (isset($_POST['payment'])) {
 		$_SESSION['DonHang']['payment']=$_POST['payment'];
 		$sp->LuuDonHang();
 		$sp->LuuChiTietDH();
 		unset($_SESSION['giohang']);
 		unset($_SESSION['DonHang']);
 	}
 	?>	
 	<div class="ads-grid_shop">
 		<div class="shop_inner_inf">
 			<div class="privacy about">
 				<div class="alert alert-success">
 					<?php if($_POST['payment']=='cod'){
 						$thongbao="<strong>Cám ơn quí khách !</strong> Đơn hàng của quý khách đã được tiếp nhận , shop sẽ tiến hành xử lý đơn hàng trong thời gian sớm nhất !";
 					}
 					else
 						$thongbao="<strong>Cám ơn quí khách !</strong> Quí khách đã chọn phương thức thanh toán chuyển khoản ngân hang,xin vui lòng thanh toán theo thông tin bên dưới, shop sẽ tiến hành xử lý đơn hàng trong thời gian sớm nhất !
 					<p>Chuyển Khoản Qua TK Ngân Hàng VCB</p>
 					<p>Chủ TK :Phan Quốc Vương</p>
 					<p>Card Number: 0123 456 789</p>
 					<p>Chi Nhánh : Ngân Hàng VCB Chi Nhánh Đông Nam</p>";
 					echo $thongbao;
 					?>
 				</div>
 				<a href="home.html"><input type="submit" name="thanhtoan" value="Quay Lại Trang Chủ" class="btn btn-primary submit"></a>
 			</div>
 		</div>
 	<?php }
 	else include "404.php";
 	?>
