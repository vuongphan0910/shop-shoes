<div class="side-bar col-md-3">
	<div class="search-hotel">
		<h3 class="agileits-sear-head">Search Here..</h3>
		<form action="" method="post" onsubmit="this.action='<?=BASE_URL?>search/'+(document.getElementsByName('tk1')[0].value)+'/'">
			<input type="search" placeholder="Product name..." name="tk1" required="">
			<input type="submit" value=" ">
		</form>
	</div>
	<div class="bg-white shadow">
		<div class="sidebar-menu">
			<!-- Sidebar navigation -->
			<ul class="nav sidebar-nav">
				<?php 
				$CL=$sp->ListCL();
				while ($rowCL=$CL->fetch_array()) {
					$idCL=$rowCL['idCL'];
					$d=$sp->ListLoai_inCL($idCL);
					?>
					<li class="dropdown">
						<a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown">
							<span class="glyphicon"></span>
							<?=$rowCL['TenCL']?>
							<b class="caret">
							</b>
						</a>
						<ul class="dropdown-menu">
							<?php while ($rowLSP=$d->fetch_array()) {
								?>
								<li>
									<a href="cat/<?=$rowLSP['idCL']?>/<?=$rowLSP['TenLoai']?>/1/" tabindex="-1">
										<?=$rowLSP['TenLoai']?>
										<span class="sidebar-badge">
										</span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>