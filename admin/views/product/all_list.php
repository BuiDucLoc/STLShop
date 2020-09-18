<?php 
	require('admin/views/commons/header.php');
	require('admin/views/commons/nav-left.php');
	require('admin/views/commons/header-right.php');
	
 ?>

<div class="container">
	<span>DANH SÁCH SẢN PHẨM</span>

	<div class="search clear-fix">
		<form action="admin.php/product/search/" method="GET">
			<input id="myInput" type="text" name="s" placeholder="Search" value="" autocomplete="off" required>
		<!-- 	<input type="submit" name="submit" value="Tìm">	 -->
		</form>
	</div>
	
	

	<div class="container-content">
		<table>
			<thead>
				<tr align="left">
					<th>STT</th>
					<th>Image</th>
					<th>Name</th>
					<th>Categories</th>
					<th>SubCategories</th>
					<th>Price</th>
					<th>Description</th>
					<th>Number</th>
					<th>Delete</th>
					<th>Edit</th>
					<th>View</th>
				</tr>
			</thead>
		<tbody>
			<?php $stt = 0; foreach ($product as $items){ $stt++ ?>
			<tr>
				<td><?php echo $stt; ?></td>
				<td ><img style="width: 100px;" src="assets/images/<?php echo $items['image_link']; ?>"></td>
				<td><?php echo $items['name']; ?></td>
				<td><?php 
					foreach ($categories as $cate) {
							if($cate['id'] == $items['categories_parent']){
								echo $cate['name'];
							}
						}
					?></td>
				<td><?php foreach ($subCategories as $subCate) {
					if($subCate['id'] == $items['categories_id']){
						echo $subCate['name'];
					}
				} ?></td>
				<td><?php echo $items['price']; ?></td>
				<td><?php echo $items['description'] ?></td>
				<td><?php echo $items['numberProduct']; ?></td>
				<td><a href="">Delete</a></td>
				<td><a href="">Edit</a></td>
				<td><a href="">View</a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	</div>
	
</div>
	
	<?php $pageList = $paginate->getLink($pages) ?>
	<div class="in">
		<ul class="pagination">
			
			<?php echo $pageList;?>
		
		</ul>

	</div>

 <?php 
 	require('admin/views/commons/footer.php');
  ?>
  <script type="text/javascript" src="assets/js/search.js">
</script>
<script type="text/javascript">
 
  var b = new Array(<?php echo json_encode($rows); ?>);

  console.log(b[0]);
  autocomplete(document.getElementById("myInput"), b[0]);
</script>