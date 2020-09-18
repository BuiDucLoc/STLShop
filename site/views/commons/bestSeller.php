<div class="product-bottom">
	<div class="of-left">
		<h3 class="best"><a href="product/bestSaller/">Best seller</a></h3>
	</div>
	<?php for ($i=0; $i < 3; $i++) {
	 ?>
	<div class="product-go">
		<div class="fashion-grid">
			<a href="product/view/<?php echo $results_bestSellers[$i]['id'] ?>"><img class="img-responsive" src="assets/images/<?php echo $results_bestSellers[$i]['image_link']; ?>"></a>
		</div>
		<div class="fashion-grid1">
			<h6 class="best2">
				<a href="product/view/<?php echo $results_bestSellers[$i]['id']; ?>"><?php echo $results_bestSellers[$i]['name']; ?></a>	
			</h6>
			<span class="price-in"><?php echo number_format($results_bestSellers[$i]['price']).'₫';?></span>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php } ?>
</div>