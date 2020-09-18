<form action="cart/add" method="POST">
	<div class="submit-order clear-fix">
		<div class="submit-order-left">
			<h2>Thông tin giao hàng</h2>
			<span>Tên người mua:</span>
	    	<input type="text" name="name" placeholder="Nhập tên bạn" required autocomplete="off"><?php ?></input>
			<span>Email:</span>
			<input type="text" name="email" placeholder="Nhập email" required autocomplete="off">
			<span>Nhập địa chỉ giao hàng:</span>
			<input type="text" name="address" placeholder="Nhập địa chỉ" 	autocomplete="off" required>
			<span>Phone:</span>
			<input type="text" name="phone" placeholder="Nhập phone của bạn" autocomplete="off" required>
			<input type="submit" name="delivery-order" value="Gởi đơn hàng">
			<input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>">	
		</div>

		<div class="submit-order-right">
			
		</div>
	
	</div>	

</form>
	
