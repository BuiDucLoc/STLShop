<!-- Gọi header -->
	<?php require('site/views/commons/header.php'); ?>

<!-- goi title -->
<!-- <p class="header">IT'S GOOD TO SEE YOU</p> -->

<!-- Gọi navbar  -->
	<?php require('site/views/commons/navBar.php');?>

	
	<!-- goi file session breadcrumb -->
	<?php require('site/views/user/session_breadcrumb_login.php') ?>
	<div class="main-login">
			<div class="container special">
				<div class="container-inner">
						<div class="roww">
							<div class="col-lg-2 col-md-2 col-sm-12">
								<div id="content">
								<h1>Đăng nhập hệ thống</h1>
								<div class="login-content">
									<div class="roww">
										<div class="col-lg-6 col-sm-6 ">
											<div class="inner">
											<h2>Khách hàng mới</h2>
												<div class="content1">
													<p>Bằng cách tạo một tài khoản bạn sẽ có thể mua sắm nhanh hơn, được cập nhật về tình trạng một đơn đặt hàng, và theo dõi các đơn đặt hàng bạn đã thực hiện trước đó.</p>
													<a href="user/register" class="btn-register">Đăng ký</a>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-sm-6 ">
											<div class="inner">
											<h2>Đăng nhập</h2>
												<form method="POST" action="user/login" class="f">
													<ul>
														<li><input class="tb" type="text" name="email" id="email" placeholder="Email*"  value="<?php echo $emailValue; ?>" required>
														<span class="error"><?php echo $emailErr ?></span>
														</li>
														<li><input class="tb" type="password" name="password" placeholder="Password*" autocomplete="off" required></li>
														<p><input type="checkbox" name="checkbox" value="on">
														Nhớ mật khẩu</p>
														<li><input class="btn-submit" type="submit" name="submit" value="Đăng nhập"></li>

													</ul>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>						
							<div></div>
						</div>		
				</div>
			</div>	
	</div>
    <!-- Gọi footer -->
</body>
</html>