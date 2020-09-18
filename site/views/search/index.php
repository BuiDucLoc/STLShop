<!-- goi header -->
<?php require('site/views/commons/header.php') ?>
<!-- goi title -->
<!-- <p class="header">IT'S GOOD TO SEE YOU</p> -->
<!-- goi navbar -->
<?php require('site/views/commons/navBar.php') ?>

<div class="container-xs">
	<!-- goi file session_breadcrumb -->
	<?php require('site/views/search/session_breadcrumb_search.php') ?>

<div class="main clearfix">
	<div class="container special">
		<div class="search-title">
			<h2>Kết quả tìm kiếm '<?php echo $_SESSION['search'] ?>': <?php echo $count; ?> kết quả</h2>
		</div>
		<?php $temp = 0;
			  $temp_length = 4;
		 ?>
		<?php for ($i=0; $i < 2 ; $i++) { ?>
		<div class="bottom-product">
			<?php for ($temp; $temp <= $temp_length; $temp++) {
				if(!isset($results[$temp])){
					break;
				}
				if($temp == $temp_length ){
					$temp = $temp;
					$temp_length = $temp_length + 4;
					break;
				}else{
				?>
			<div class="col-md-4 product1">
				<div class="product-at">
					<a href="product/view/<?php echo $results[$temp]['id']; ?>"><img class="other" src="assets/images/<?php echo $results[$temp]['image_link'] ?>"></a>
					<p class="tun"><?php echo $results[$temp]['name'] ?></p>
					<a href="#" class="items-add">
						<p class="number item-price">
							<?php echo number_format($results[$temp]['price']).'₫'; ?>
						</p>
					</a>
				</div>
			</div>		
			<?php } }?>
			<div class="clear-fix"></div>	
		</div>
	<?php } ?>
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

<!-- goi footer -->
<?php require('site/views/commons/footer.php') ?>
	
	</body>
</html>