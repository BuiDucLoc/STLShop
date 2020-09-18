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
		<div class="product-price">
			<div class="single-top">
				<div class="slideshow-gallery">
					<?php for($i = 0; $i < count($image_list) ;$i++){?>
					<div class="myslide">
						<img src="assets/images/<?php echo $image_list[$i];?>" width="100%">
					</div>
					<?php } ?>
					<a href="prev"></a>
					<a href="next"></a>		
				</div>

				<div class="row1">

					<div class="column1">
						<img onclick="currentSlide(1)" class="demo cursor" src="assets/images/<?php echo $image_list[0];?>" width="100%">
					</div>

					<div class="column1">
						<img onclick="currentSlide(2)" class="demo cursor" src="assets/images/<?php echo $image_list[1];?>" width="100%">
					</div>

					<div class="column1">
						<img onclick="currentSlide(3)" class="demo cursor" src="assets/images/<?php echo $image_list[2];?>" width="100%">
					</div>

					<div class="column1">
						<img onclick="currentSlide(4)" class="demo cursor" src="assets/images/<?php echo $image_list[3];?>" width="100%">
					</div>
					
				</div>
			</div>
				<div class="single-para">
					<form action="cart" method="POST">
					<h4><?php echo $row[0]['name']; ?></h4>
					<h5 class="item_price"><?php echo number_format($row[0]['price']).'₫' ?></h5>
					<p><?php echo $row[0]['description'] ?></p>
					<div class="available">
						<ul>
							<li> Màu sắc:
								<select name="color">
									<option>Đỏ</option>
									<option>Đen</option>
									<option>Hồng</option>
									<option>Xám</option>
								</select>
							</li>
							<li class="size-in"> Kích cỡ:
								<select name="size">
									<option>XL</option>
									<option>L</option>
									<option>M</option>
									<option>S</option>
								</select>
							</li>
							<li>
								Số lượng:
								<input type="number" name="number" autocomplete="off" step="1" min="1" max="<?php echo $row[0]['numberProduct'] ?>" value="1" >
							</li>
							<?php $count_number = $row[0]['numberProduct']; if(intval($count_number > 0)){ ?>
							<li>Cửa hàng còn <?php echo $count_number; ?> sản phẩm !</li>
							<?php }else{ ?>
							<li>Tạm hết hàng</li>
							<?php } ?>
							<div class="clear-fix"></div>
						</ul>

					</div>
					<input type="hidden" name="id" value="<?php echo $row[0]['id'] ?>">
					<input type="hidden" name="name" value="<?php echo $row[0]['name'] ?>">
					<input type="hidden" name="image" value="<?php echo $image_list[0] ?>">
					<input type="hidden" name="price" value="<?php echo $row[0]['price'] ?>">
					<?php if($count_number > 0){ ?>
					<button class="add-cart" type="submit" name="call-cart" onclick="addCart()">Thêm vào giỏ hàng</button>
					<button class="add-cart buy" type="submit" name="buy-now">Mua Hàng</button>
				<?php }else{} ?>

					</form>
				</div>
				<div class="clear-fix"></div>

			<div class="tabs">
				<nav>
					<ul class="tabs-navigation">
						<li><a  data-content = "fashion" href="#" id = "tablink">Description</a></li>
						<li><a  data-content = "cinema" href="#" id = "tablink">Additional Information</a></li>
						<li><a class="selected"  data-content = "television" href="#" id = "tablink">Review(<?php echo $count; ?>)</a></li>
					</ul>

					<ul class="tabs-content">
						<li data-content = "fashion" class="tabct" id="a">
							<div class="facts">
								<p><?php echo $row[0]['description'] ?></p>
							</div>
						</li>

						<li data-content = "cinema" class="tabct" id="b">
							<div class="facts1">
								<div class="color">
									<p>Color</p>
									<span>Blue Black Red</span>
									<div class="clear-fix"></div>
								</div>
								<div class="color">
									<p>Size</p>
									<span>S,M,L,XL</span>
									<div class="clear-fix"></div>
								</div>
							</div>
						</li>

						<li data-content = "television" class="selected" id="c">
							<?php if($count > 0){
								for ($i = 0; $i < count($list_comment);$i++) {?>
							<div class="comment-top">

								<div class="comment-left">
									<p class="avatar-comment">T</p>
								</div>
								
								<div class="comment-right">
									
									<h6><a href="#"><?php echo $list_comment[$i]['name'] ?></a>
										<?php $date = date_create($list_comment[$i]['created']); ?>
										<span>Ngày Đăng : <?php echo date_format($date, 'd-m-Y') ?></span>
									</h6>
									<p><?php echo $list_comment[$i]['content'] ?></p>	
									
								</div>
								
								<div class="clear-fix"></div>	
							</div>
							<?php } }else{?>
									<p class="empty-comment">Không có bình luận nào...</p>
									
								<?php } ?>			
							<div class="comment-place">
									
									<?php if(isset($_SESSION['user'])){ ?>
									<form action="product/view/<?php echo $row[0]['id'] ?>" method="POST">
										<textarea style="overflow-y: visible;" placeholder="Nhập bình luận..." name="content"></textarea>
										<button class="add-review" name="">Add Review</a>
									</form>
										
									<?php }else{ ?>
										<p>Bạn cần đăng nhập để bình luận...</p>
									<?php } ?>
								</div>
						</li>
					</ul>
				</nav>
				<div class="clear-fix"></div>
			</div>
			
			<div class="bottom-product">
				<h2>Sản phẩm liên quan</h2>
			<?php foreach ($result_paginate as $items){
				?>
			<div class="col-md-4 product1">
				<div class="product-at">
					<a href="product/view/<?php echo $items['id'] ?>"><img class="img-responsive" src="assets/images/<?php echo $items['image_link']; ?>"></a>
					<p class="tun"><?php echo $items['name']; ?></p>
					<a class="items-add">
						<p class="number item-price">
							<?php echo number_format($items['price']).'₫'; ?>
						</p>
					</a>
				</div>
			</div>	
			<?php } ?>
			<div class="clear-fix"></div>	
		</div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript" src="assets/js/SlideShow.js"></script>
<!-- Gọi Footer -->
	<?php require('site/views/commons/footer.php') ?>
	<!-- //<script type="text/javascript" src="assets/js/Navbar.js"></script>
    //<script type="text/javascript" src="assets/js/SlideShow.js"></script>  -->
    <script type="text/javascript" src="assets/js/SlideShow.js"></script>
    <script>
    	jQuery(document).ready(function($){
		var tabItems = $('.tabs-navigation a'),
		tabContentWrapper = $('.tabs-content');

		tabItems.on('click', function(event){
		event.preventDefault();
		var selectedItem = $(this);
		if( !selectedItem.hasClass('selected') ) {
			var selectedTab = selectedItem.data('content'),
				selectedContent = tabContentWrapper.find('li[data-content="'+selectedTab+'"]'),
				selectedContentHeight = selectedContent.innerHeight();
			
			tabItems.removeClass('selected');
			selectedItem.addClass('selected');
			selectedContent.addClass('selected').siblings('li').removeClass('selected');
			//animate tabContentWrapper height when content changes 
			tabContentWrapper.animate({
				'height': selectedContentHeight
			}, 200);
		}
	});
});
    </script>
</body>
</html>