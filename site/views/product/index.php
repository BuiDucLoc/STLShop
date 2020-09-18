<!-- goi file header -->
<?php require('site/views/commons/header.php') ?>

<!-- title -->
<!-- <p class="header">IT'S GOOD TO SEE YOU</p> -->

<!-- goi file navBar -->
<?php require('site/views/commons/navBar.php') ?>

<!-- Gọi file session breadcrumb -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<?php require('site/views/product/session_breadcrumb.php') ?>
<div class="product">
	
	<div class="container special">
		<!-- goi file list categories -->
		<?php require('site/views/product/categories.php') ?>

		<!-- goi file list best saler -->
		<?php require('site/views/commons/bestSeller.php') ?>

		<!-- goi file discount -->
		<?php require('site/views/product/discount.php') ?>
	</div>
	
	<div class="container-product-2 product1">
		<h2>
			<p>Tất cả sản phẩm</p>
		</h2>
		<?php 
			$temp= 0;
			$temp_length = 4;
		for ($i=0; $i < 3 ; $i++) { ?>
		<div class="bottom-product">
			<?php 
			for ($temp; $temp <= $temp_length;$temp++) {
				if(!isset($results[$temp])){
					break;
				}
				if($temp == $temp_length){
					$temp = $temp;
					$temp_length = $temp_length +4;
					
					break;	
				}else{?>
			<div class="col-md-4 product1">
				<div class="product-at">
					<!-- image -->
					<a href="product/view/<?php echo $results[$temp]['id'] ?>"><img class="img-responsive" src="assets/images/<?php echo $results[$temp]['image_link'] ?>"></a>
					<!-- description -->
					<p class="tun"><?php echo $results[$temp]['name'] ?></p>
					<!-- price -->
					<a href="product/view/<?php echo $results[$temp]['id'] ?>" class="items-add">
						<p class="number item-price">
							<?php echo number_format($results[$temp]['price']).'₫' ?>
						</p>
					</a>

				</div>
			</div>	
			<?php 
				}
			} ?>
			<div class="clear-fix"></div>	
		</div>
		<?php } ?>
		
	</div>
	<div class="clear-fix"></div>
	<?php 
	$pageList = $paginate->getLink($pages) ?>
	<div class="in">
		<ul class="pagination">
			<!-- <li><a href="#"><span>&laquo;</span></a></li> -->
			<?php echo $pageList;?>
			<!-- <li><a href="#"><span>&raquo;</span></a></li> -->
		</ul>

	</div>
	</div>
</div>
</div>

<!-- Gọi Footer -->
	<?php require('site/views/commons/footer.php') ?>
	<!-- //<script type="text/javascript" src="assets/js/Navbar.js"></script>
    //<script type="text/javascript" src="assets/js/SlideShow.js"></script>  -->
</body>
</html>