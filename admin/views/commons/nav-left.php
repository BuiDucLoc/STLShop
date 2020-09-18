		<div class="col-md-2 left-col">
			<div class="dashboard-title">
				<a href="admin.php">ADMIN</a>
			</div>
			<div class="admin profile">
				<div class="wrapper">
					<div class="profile-left">
						<span>T</span>
					</div>
					<div class="profile-body">
						<p>Tin</p>
						<p>Master Admin</p>
					</div>
				</div>
			</div>
			<div class="sidebar-menu">
				<div class="menu-session">
					<div class="wrapper">
						<h4>Menu</h4>
						<div class="menu-left">
							<ul class="sidebar-left">
								<li>
									<a class="dropdown-btn">
										Categories
										<span class="caret-down"></span>
									</a>
									
									<ul class="sub-menu">
										<li><a href="#">Add Categories</a></li>
										<li><a href="#">All Category</a></li>
									</ul>		
								
								</li>
								<li>
									<a class="dropdown-btn">
										Sub Categories
										<span class="caret-down"></span>
										
									</a>
									<ul class="sub-menu">
										<li><a href="#">Add Sub Categories</a></li>
										<li><a href="#">All Sub Categories</a></li>
									</ul>
								</li>
								<li>
									<a class="dropdown-btn">
										Product
										<span class="caret-down"></span>
										
									</a>
									<ul class="sub-menu">
										<li><a href="admin.php/product/add">Add Product</a></li>
										<li><a href="admin.php/product/all_list">All Product</a></li>
									</ul>
								</li>
								<li>
									<a class="dropdown-btn">
										News
										<span class="caret-down"></span>
										
									</a>
									<ul class="sub-menu">
										<li><a href="#">Add News</a></li>
										<li><a href="#">All News</a></li>
									</ul>
								</li>
								<li>
									<a class="dropdown-btn">
										Member
										<span class="caret-down"></span>
										
									</a>
									<ul class="sub-menu">
										<li><a href="#">Add Member</a></li>
										<li><a href="#">All Member</a></li>
									</ul>
								</li>
								<li>
									<a class="dropdown-btn">
										Order
										<span class="caret-down"></span>
										
									</a>
									<ul class="sub-menu">
										<li><a href="#">Order Success</a></li>
										<li><a href="#">Order Waiting</a></li>
										
									</ul>
								</li>
								<li>
									<a>
										Feedback
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

<script type="text/javascript">
	$(function(){
		var menu_ul = $('.sidebar-left li ul'),
			menu_a  = $('.sidebar-left > li > a');       
			   			   			        
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			       	
			        //categories click vao lan dau tien
			        if(!$(this).hasClass('active')) {	
			            menu_a.removeClass('active');        
			            menu_ul.filter(':visible').slideUp('normal');
			             $(this).addClass('active').next().stop(true,true).slideDown('normal');
			         }else {	        	
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
	});
</script>
