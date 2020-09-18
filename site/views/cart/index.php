<!--Gọi file header.php-->
	<?php require('site/views/commons/header.php');?>
<!--  -->
<!-- p class="header">IT'S GOOD TO SEE YOU</p> -->
<!-- Gọi file menu -->
<?php require('site/views/commons/navBar.php');?>	
<!-- goi file breadcrumb -->
<?php require('site/views/cart/session_breadcrumb.php') ?>
<?php if(isset($_SESSION['product'])){
	sort($_SESSION['product']);
} ?>
<div class="main">
	<div class="container special clear-fix">
		<?php if(empty($cart)){ ?>
			<div class="alert">
				<p>&otimes; Giỏ hàng không có sản phẩm, vui lòng thực hiện lại !</p>
			</div>
			<h1 class="amount-of-cart">Giỏ hàng(0 sản phẩm)</h1>
			<div class="cart-empty">
				<img class="mascot-image" src="assets/images/cart.png">
				<p class="messages">Không có sản phẩm nào trong giỏ hàng của bạn.</p>
				<a href="product">Tiếp tục mua sắm</a>
			</div>
			<?php }else{?>
		<div class="check">
			<h1>Giỏ hàng(<?php if(!empty($cart)){sort($cart);echo count($cart);} ?> sản phẩm)</h1>
		<form method="POST" action="cart">
			<div class="cart-items border-cart">
				<?php 
				$i =1;
				$total = 0;
				foreach ($cart as $items) {?>
				<div class="cart-header">
					<div>
						<input type="text" class="delete-cart close" value="<?php echo $i; ?>">

					</div>
					<div class="cart-sec">
						<a href="product/view/<?php echo $items['id'] ?>">
						<div class="cart-img"><img src="assets/images/<?php echo $items['image']; ?>" class="img-responsive"></div>
						</a>
						<div class="cart-info">
							<h3><a href="product/view/<?php echo $items['id']; ?>"><?php echo $items['name']; ?></a></h3>
							<ul class="qty">
								<li><p>Size: <?php echo $items['size']; ?></p></li>
								<li><!-- <select>
									<option>XL</option>
									<option>L</option>
									<option>M</option>
									<option>S</option>
								</select> --></li>
								<li><p>Qty: <?php echo $items['number']; ?></p></li>
							
								<li><input type="number" name="number[<?php echo $i; ?>]" value="<?php echo $items['number']; ?>"></li>
								<li><p>Color: <?php echo $items['color']; ?></p></li>
								<li><!-- <select>
									<option>Đỏ</option>
									<option>Xanh</option>
									<option>Hồng</option>
									<option>Đen</option>
								</select> --></li>
								
							</ul>
							<input type="hidden" name="id[<?php echo $i ?>]" value="<?php echo $items['id']; ?>">
							<input type="hidden" name="name[<?php echo $i ?>]" value = "<?php echo $items['name'] ?>"
								>
							<input type="hidden" name="size[<?php echo $i ?>]" value = "<?php echo $items['size'] ?>">
				
							<input type="hidden" name="image[<?php echo $i ?>]" value="<?php echo $items['image'] ?>">
							<input type="hidden" name="price[<?php echo $i ?>]" value = "<?php echo $items['price'] ?>">
							<ul>
								<li><input type="submit" class="update-cart" name="update-cart" value="Cập nhật giỏ hàng"></li>
							</ul>
							<div class="delivery">
								<p>Price : <?php echo number_format($items['price']).'₫'; 
								$total = $total + (floatval($items['price'])*$items['number']);
								 ?></p>
								<span>Delivery in 2-3 bussiness days</span>
							</div>
						</div>
						<div class="clear-fix"></div>
					</div>
				</div>
				
				<?php $i++; } ?>
			</div>
			

			<div class="cart-total">
				<a href="product" class="order">Tiếp Tục Mua Sắm</a>
				<div class="price-details">
					<h3>Price Details</h3>
					<span>Total:</span>
					<span class="total1"><?php echo number_format($total).' ₫';  ?></span>
					<span>Discount:</span>
					<span class="total1">0</span>
					<span>Delivery charges:</span>
					<span class="total1">0</span>
					<div class="clear-fix"></div>
				</div>
				<ul class="total-price">
					<li class="last-price"><span>TOTAL:</span></li>
					<li class="last-price"><span class="price"><?php echo number_format($total).' ₫'; ?></span></li>
					<div class="clear-fix"></div>
				</ul>
				
				
				<input name="add-into-bill" class="order" type="submit" value="Đặt Hàng"></input>
			</div>
		
		</form>
			<div class="clear-fix"></div>
		<?php } ?>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(".delete-cart").click(function(){
			var c = $(this).val();
			$.ajax({
				url:"./ajax/delete_cart",
				type:"post",
				data:"pos="+c,
				async:true,
				success:function(){
					window.location.reload();
				}
			});
			return true;
		});
	});
</script>
<!-- Gọi file footer -->
<?php require"site/views/commons/footer.php";?>  
</body>
</html>