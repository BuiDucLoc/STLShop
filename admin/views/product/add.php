<?php 
	require('admin/views/commons/header.php');
	require('admin/views/commons/nav-left.php');
	require('admin/views/commons/header-right.php');
	
 ?>
<script type="text/javascript">
  $(document).ready(function(){

    $('#categories').change(function(){
      var category = $('#categories option:selected').val();
      $.ajax({
        url:'admin.php/ajax/sub_categories',
        type:'post',
        data:{
          category:category,
        },
        async:true,
        dataType:'html',
        success:function(result){
          $('#subcategories').html(result);
        }
      });
      return false;
    });

  });
</script>
<script src='admin/views/assets/js/tinymce/js/tinymce/tinymce.min.js'></script>
<div class="container">
  <form action="admin.php/product/addProduct" method="POST" enctype="multipart/form-data">
 		<!-- categories cua san pham -->
 		<span>Categories</span>
 		<select name="categories" id="categories" required="">
 			<option></option>
			<?php foreach ($categories as $items) {?>
				<option value="<?php echo $items['id'] ?>"><?php echo $items['name']; ?></option>
      <?php } ?>
 		</select>
 		<span>Sub Categories</span>
 		<select  name="subcategories" id="subcategories"> </select>
 		<span>Name</span>
 		<input type="text" name="name" value="" placeholder="Name product" required="" autocomplete="off">
 		<span>Price</span>
 		<input type="text" name="price" value="" placeholder="Price product" required="">
    <span>Number of product</span>
    <input type="text" name="number" value="" placeholder="Number of product" required="">
 		<span>Description</span>
 		<script type="text/javascript">
                  tinymce.init({
                    selector: '#description',
                    theme: 'modern',
                    width: 1000,
                    height: 300,
                    plugins: [
                      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                      'save table contextmenu directionality emoticons template paste textcolor jbimages'
                    ],
                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons jbimages',
                    relative_urls: false
                  });  
    </script>
        <textarea id="description" name="description" ></textarea>
        <span>Image</span>
        <input type="file" name="image" required="">
        <span>Image-List</span>
        <input type="file" name="image_list[]" multiple="">
        <span>Sản phẩm nổi bật</span>
		    <input type="radio" name="hightLight" value="1">Active
		    <input type="radio" name="hightLight" value="0">Disactive
        <input type="submit" name="add-product" class="add-product" value="Add">
 	</form>
</div>

 <?php 
 	require('admin/views/commons/footer.php');
  ?>