<div class="search_w3ls_agileinfo">
	<div class="cd-main-header">
		<ul class="cd-header-buttons">
			<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
		</ul>
	</div>
	<div id="cd-search" class="cd-search">
		<form action="" method="post" onsubmit="this.action='<?=BASE_URL?>search/'+(document.getElementsByName('tk')[0].value)+'/'" id="frm_tim">
			<input type="hidden" name="p" value="kqtk">
			
			<input type="search" placeholder="Product name..." name="tk" id='tk' required="">
		</form>
	</div>
</div>