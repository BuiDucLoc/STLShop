<!-- goi file header -->
<?php require('site/views/commons/header.php') ?>

<!-- title -->
<!-- <p class="header">It's good to see you</p> -->

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
	<?php if(!empty($results)){ ?>
	<div class="container-product-2 product1">
		
		
		<div class="bottom-product">
			<?php 
			if($results > 0){
			foreach ($results as $items) {?>
			<div class="col-md-4 product1">
				<div class="product-at">
					<!-- image -->
					<a href="product/view/<?php echo $items['id'] ?>"><img class="img-responsive" src="assets/images/<?php echo $items['image_link'] ?>"></a>
					<!-- description -->
					<p class="tun"><?php echo $items['name'] ?></p>
					<!-- price -->
					<a href="product/view/<?php echo $items['id'] ?>" class="items-add">
						<p class="number item-price">
							<?php echo number_format($items['price']).'₫'?>
						</p>
					</a>

				</div>
			</div>	
			<?php } }?>
			<div class="clear-fix"></div>	
		</div>
		
		
	</div>
	<?php }else{
		echo "Hiện không có sản phẩm !";
	} ?>
	<div class="clear-fix"></div>
	<?php $pageList = $paginate->getLink($pages) ?>
	<div class="in">
		<ul class="pagination">
			<?php echo $pageList; ?>
		</ul>
	</div>
	</div>
</div>
</div>

<!-- Gọi Footer -->
	<?php require('site/views/commons/footer.php'); ?>
	<!-- //<script type="text/javascript" src="assets/js/Navbar.js"></script>
    //<script type="text/javascript" src="assets/js/SlideShow.js"></script>  -->
</body>
</html>