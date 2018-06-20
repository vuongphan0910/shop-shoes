<div class="ads-grid_shop">
	<div class="shop_inner_inf">
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>
			<?php if(isset($_SESSION['giohang'])){
				$k=count($_SESSION['giohang']); 
				if($k>0){
					$tongtien=0;
					?>
					<div class="checkout-right">
						<h4>Giỏ Hàng Của Bạn Đang Có: <span><?=$k;?> Sản Phẩm</span></h4>
						<form action="submit_cart.php?action=update" method="post" id="frm_cart" name="frm_cart"> 
							<table class="timetable_sub">
								<thead>
									<tr>
										<th>STT</th>
										<th>Hình Ảnh</th>
										<th>Số Lượng</th>
										<th>Tên Sản Phẩm</th>
										<th>Giá</th>
										<th>Tổng</th>
										<th>Xóa</th>
									</tr>
								</thead>
								<tbody>
									<?php $stt=0;for($i=0;$i<$k;$i++){
										$stt++;
										$tenSP= $_SESSION['giohang'][$i]['TenSP'];
										$sl= $_SESSION['giohang'][$i]['sl'];
										$giatien= $_SESSION['giohang'][$i]['gia'];
										$idSP= $_SESSION['giohang'][$i]['gia'];
										$urlHinh= $_SESSION['giohang'][$i]['urlHinh'];
										$tong=$sl*$giatien;
										?>
										<tr class="rem<?=$stt?>">
											<td class="invert"><?=$stt?></td>
											<td class="invert-image"><a href="single.html"><img src="<?="upload/hinhchinh/".$urlHinh?>" alt=" " class="img-responsive"></a></td>
											<td class="invert">
												<div class="quantity">
													<div class="quantity-select"><input type="number" min="1" value="<?=$sl?>" name="sl_<?=$i?>" class="form-control" >
													</div>
												</div>
											</td>
											<td class="invert"><?=$tenSP?></td>
											<td class="invert"><?=number_format($giatien,0,',','.')." VNĐ"?></td>
											<td class="invert"><?=number_format($tong,0,',','.')." VNĐ"?></td>
											<td class="invert">
												<div class="rem">
													<a href="submit_cart.php?action=remove&idSP=<?=$i?>" title=""onclick="return confirm('Bạn có muốn xóa sản phẩm này?')"><div class="close1" style="position: static;"> </div> </a>
												</div>
											</td>
										</tr>
									<?php } ?>	
									<tr><td colspan="7"><a href="home.html" style="float:left;" class="btn btn-primary submit">Quay Lại Trang Home</a><input type="submit" name="update" class="btn_cart" value="Cập Nhật Giỏ Hàng" /> <a href="thong-tin-giao-hang/"><input type="button" name="update" class="btn_cart" value="Tiến Hành Thanh Toán" /></a></td></tr>
								</tbody>
							</table>
						</form>
					</div>
				<?php } }
				else  
					echo "Chưa có sản phẩm nào ";
				?>
			</div>
		</div>
	</div>
