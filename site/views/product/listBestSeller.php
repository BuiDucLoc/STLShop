<!-- goi file header -->
<?php require('site/views/commons/header.php') ?>

<!-- title -->
<!-- <p class="header">It's good to see you</p> -->

<!-- goi file navBar -->
<?php require('site/views/commons/navBar.php') ?>

<!-- Gọi file session breadcrumb -->
		<link rel="stylesheet" type="text/css" href="assets/css/product.css">
		<?php require('site/views/product/session_breadcrumb.php') ?>
<div class="product">
	<div class="container special">
		<!-- goi file list categories -->
		<?php require('site/views/product/categories.php') ?>

	<!-- goi file list best saler -->
		<?php require('site/views/commons/bestSeller.php') ?>
	</div>
	
	<div class="col-md-9 product1">
		<h2>
			<p>Best Seller</p>
		</h2>
		<?php 
			$temp= 0;
			$temp_length = 4;
		for ($i=0; $i < 4 ; $i++) { ?>
		<div class="bottom-product">
			<?php 
			for ($temp; $temp <= $temp_length;$temp++) {
				if(!isset($results[$temp])){
					break;
				}
				if($temp == $temp_length){
					$temp = $temp;
					$temp_length = $temp_length+4;
					break;	
				}else{?>
			<div class="col-md-4 product1">
				<div class="product-at">
					<a href="#"><img class="img-responsive" src="assets/images/<?php echo $results[$temp]['image_link'] ?>"></a>
					<p class="tun"><?php echo $results[$temp]['name'] ?></p>
					<a href="#" class="items-add">
						<p class="number item-price">
							<?php echo $results[$temp]['price']; ?>
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
	<?php $pageList = $paginate->getLink($_GET['page'], $pages) ?>
	<div class="in">
		<ul class="pagination">
			<li><a href="#"><span>&laquo;</span></a></li>
			<?php echo $pageList; ?>
			<li><a href="#"><span>&raquo;</span></a></li>
		</ul>

	</div>
	</div>
</div>
</div>

<!-- Gọi Footer -->
	<?php require('site/views/commons/footer.php') ?>
	<script type="text/javascript" src="assets/js/Navbar.js"></script>
    <script type="text/javascript" src="assets/js/SlideShow.js"></script> 
    
</body>
</html>
