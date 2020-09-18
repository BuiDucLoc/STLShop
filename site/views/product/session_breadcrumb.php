<ul class="breadcrumb">
	<li><a href="">Trang chủ</a></li>

	<?php if(isset($_SESSION['breadcrumb_detail']) && $_SESSION['breadcrumb_detail'] == 'yes'){ 
			$_SESSION['breadcrumb_detail'] = 'no';
		?>
	    <li><a href="product">Sản phẩm</a></li>
		<li><?php echo $row[0]['name']; ?></li>
	<?php }else{ ?>
		<li>Sản phẩm</li>
	<?php } ?>
</ul>