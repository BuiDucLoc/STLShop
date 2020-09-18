<!-- goi header -->
<?php require('site/views/commons/header.php') ?>
<!-- goi title -->
<!-- <p class="header">IT'S GOOD TO SEE YOU</p> -->
<!-- goi navbar -->
<?php require('site/views/commons/navBar.php') ?>
<link rel="stylesheet" type="text/css" href="assets/css/login.css">

<!-- goi file session breadcrumb register -->
<?php require('site/views/user/session_breadcrumb_register.php') ?>
<div class="main-login">
			<div class="container">
				<div class="container-inner">
						<div class="roww">
							<div class="col-lg-2 col-md-2 col-sm-12">
								<div id="content">
								<h1>Đăng ký khách hàng thân quen</h1>
								<div class="login-content">
									<div class="roww">
										<div class="col-lg-6 col-sm-6 ">
											<div class="inner">
											<h2>Khách hàng mới</h2>
												<div class="content1">
													<p>Bằng cách tạo một tài khoản bạn sẽ có thể mua sắm nhanh hơn, được cập nhật về tình trạng một đơn đặt hàng, và theo dõi các đơn đặt hàng bạn đã thực hiện trước đó.</p>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-sm-6 ">
											<div class="inner2">
											<h2>Đăng ký</h2>
												<form method="POST" action="user/register" class="f">
													<ul>
														<li><input class="dk" type="text" name="firstname" placeholder="Họ" autocomplete="off" value="<?php echo $firstnameValue ?>" required><span class="error"><?php echo $firstNameErr;?></span></li>
														
														<li><input class="dk" type="text" name="lastname" placeholder="Tên" autocomplete="off" value="<?php echo $lastnameValue ?>" required><span class="error"><?php echo $lastNameErr;?></span></li>
														
														<li><input class="dk" type="text" name="phone" placeholder="Phone" autocomplete="off" value="<?php echo $phoneValue ?>" required><span class="error"><?php echo $phoneErr;?></span></li>
														
														<li><input class="dk" type="text" name="email" placeholder="Email" autocomplete="off" value="<?php echo $emailValue ?>" required><span class="error"><?php echo $emailErr;?></span></li>
														
														<li><input class="dk" autocomplete="off" type="password" name="password" placeholder="Password" required></li>

														<li><input class="dk" autocomplete="off" type="password" name="confirmPassword" placeholder="Confirm password" required></li>

														<li><input class="btn-submit" type="submit"  value="Đăng Ký"></li>
														
													</ul>
												</form>
											</div>
											<a href=""><p class="backtohome">&larr; Back to home</p></a>
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


<!-- goi footer -->

	
	</body>
</html>