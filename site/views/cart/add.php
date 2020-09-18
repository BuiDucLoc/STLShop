<!--Gọi file header.php-->
	<?php require('site/views/commons/header.php');?>
<!--  -->
<!-- <p class="header">IT'S GOOD TO SEE YOU</p> -->
<!-- Gọi file menu -->
<?php require('site/views/commons/navBar.php');?>	
<!-- goi file breadcrumb -->
<?php require('site/views/cart/session_breadcrumb.php') ?>

<div class="main">
	<div class="container special clear-fix">
	<?php if(!isset($_SESSION['user'])){ ?>
		<div class="login-to-buy" style="border:1px solid #C4C3C3;background: #F8F8F8;border-radius: 4px;">
			<div class="tab">
					<a class="tab-link" onclick="openTab(event, 'login')" id="default-open">
						<span>Đăng Nhập</span>
						<i>Đã Là Thành Viên TSLShop</i>	
					</a>
							
					<a class="tab-link" onclick="openTab(event,'register')">
						<span>Đăng Ký</span>
						<i>Dành Cho Thành Viên Mới</i>	
					</a>
							
				<div class="clear-fix"></div>
			</div>
			<?php if(isset($emailValue) && isset($emailErr)){
				$Value = $emailValue;
				$Err = $emailErr;
			}else{
				$Value = '';
				$Err = '';
			} ?>
			<div class="content-tab" id="login" >
				<form action="user/login" method="POST">
					<span>Email:</span>
					<input type="text" name="email" placeholder="Nhập Email" value="<?php echo $Value; ?>" required>
					<span class="error"><?php echo $Err; ?></span>
					<span>Mật khẩu:</span>
					<input type="password" name="password" placeholder="Nhập Mật Khẩu" required>
					<button type="submit" name="login">Đăng Nhập</button>
					<input type="hidden" name="pointer-login-to-buy">
				</form>
			</div>
			<?php if (isset($firstnameValue) && isset($lastnameValue) && isset($emailValue) && isset($phoneValue) && isset($firstNameErr) && isset($lastNameErr) && isset($emailErr) && isset($phoneErr)) {
				$fValue = $firstnameValue;
				$lValue = $lastnameValue;
				$eValue = $emailValue;
				$pValue = $phoneValue;
				$fError = $firstNameErr;
				$lError = $lastNameErr;
				$eError = $emailErr;
				$pError = $phoneErr;
			}else{
				$fValue = $lValue = $eValue = $pValue = '';
				$fError = $lError = $eError = $pError = '';
			} ?>
			<div class="content-tab" id="register">
				<form action="user/register" method="POST">
					<span>Họ:</span>
					<input type="text" name="firstname" placeholder="Nhập Họ Tên..." autocomplete="off" value = "<?php echo $fValue; ?>" required>
					<span class="error"><?php echo $fError; ?></span>
					<span>Tên:</span>
					<input type="text" autocomplete="off" value="<?php echo $lValue; ?>"  name="lastname" placeholder="Nhập Tên..." required>
					<span class="error"><?php echo $lError; ?></span>
					<span>Phone:</span>
					<input type="text" name="phone" value="<?php echo $pValue; ?>" autocomplete="off"  placeholder="Phone..." required>
					<span class="error"><?php echo $pError ?></span>
					<span>Email:</span>
					<input type="text" name="email" value="<?php echo $eValue; ?>" autocomplete="off"  placeholder="Email..." required>
					<span class="error"><?php echo $eError; ?></span>
					<span>Password:</span>
					<input type="password" name="password"  placeholder="Password" required >
					<span>Confirm password:</span>
					<input type="password" name="confirmPassword" autocomplete="off"  placeholder="Confirm Password..." required>
					<button type="submit" name="register">Đăng Ký</button>
					<input type="hidden" name="pointer-register-to-buy">
				</form>
			</div>
			<div class="clear-fix"></div>
		</div>
		<?php 
			$total = 0;
		 ?>
		<div class="infor-product-buy">
			<div class="info-detail">
				<ul>
				<li>
					<h3>Đơn Hàng(<?php echo count($_SESSION['product']); ?> Sản Phẩm)</h3>
					<a href="cart">Edit</a>
					<div class="clear-fix"></div>
				</li>
				<li>
				<?php for ($i=0; $i < count($_SESSION['product']); $i++) {  ?>
					<h3>
						<?php echo $_SESSION['product'][$i]['number'] ?> x
						<a href="product/view/<?php echo $_SESSION['product'][$i]['id']; ?>"><?php echo $_SESSION['product'][$i]['name']; ?></a>
					</h3> 
					<span><?php echo number_format($_SESSION['product'][$i]['price']).'₫'; 
						$total = $total + (floatval($_SESSION['product'][$i]['price']) * $_SESSION['product'][$i]['number']);
					?></span>
					<div class="clear-fix"></div>
				<?php } ?>
				</li>
				<li>
					<h3>Tạm Tính:</h3>
					<span><?php echo number_format($total).'₫'; ?></span>
					<div class="clear-fix"></div>
				</li>
				<li>
					<h3>Thành Tiền:</h3>
					<span><?php echo number_format($total).' ₫'; ?>
					</span>
					<div class="clear-fix"></div>
				</li>
			</ul>
			</div>
		</div>
		<div class="clear-fix"></div>
	<?php }else{
		if(isset($_SESSION['bill'])){
			$bill = $_SESSION['bill'];
		}
		require('site/views/cart/address.php');
	} ?>
		
	

<!-- Gọi file footer -->
<script type="text/javascript">
	function openTab(evt, name){
		var i, tablinks, tabContent;
		tabContent = document.getElementsByClassName('content-tab');
		for(i = 0; i < tabContent.length; i++){
			tabContent[i].style.display = 'none';
		}
		tablinks = document.getElementsByClassName('tab-link');

		for(i = 0; i < tablinks.length; i++){
			 tablinks[i].className = tablinks[i].className.replace(" active1", "");
		}
		document.getElementById(name).style.display = 'block';
		evt.currentTarget.className += " active1";
	}
	document.getElementById('default-open').click();
</script>
</body>
</html>