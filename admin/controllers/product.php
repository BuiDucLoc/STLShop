	<?php 
	require('admin/models/product.php');
	require('admin/models/paginate.php');
	/**
	 * 
	 */
	class ProductController extends ProductModel
	{
		public function add(){
			$categories = parent::list_categories();
			require('admin/views/product/add.php');
		}

		public function addProduct(){
			if(isset($_POST['add-product']) && $_POST['categories'] != NULL && $_POST['name'] != NULL && $_POST['price'] != NULL && $_POST['description'] != NULL && !empty($_FILES['image']) && !empty($_FILES['image_list']) && $_POST['number']){

				//thu muc luu file upload
				$path = 'assets/images/';
				//duong dan den file upload o client
				$tmp_name = $_FILES['image']['tmp_name'];
				//ten cua file se upload
				$name = $_FILES['image']['name'];
				//kieu file upload
				$type = $_FILES['image']['type'];
				//kich thuoc file upload
				$size = $_FILES['image']['size'];

				$allowUpload = true;
				//mang chua ten mo rong cua file co the upload
				$allowType = array('jpg','png','jpeg');
				//gioi han kich thuoc cua file duoc upload
				$maxFileType = 512000;//byte
				//lay duoi mo rong cua file upload
				$imageFileType = pathinfo($path.$name, PATHINFO_EXTENSION);
				
				//uploading multiple files
				$image_name = $_FILES['image_list']['name'];
				$image_size = $_FILES['image_list']['size'];
				$image_type = $_FILES['image_list']['type'];
				$tmp_image_name = $_FILES['image_list']['tmp_name'];
				$countItems = count($image_name);

				$check = getimagesize($_FILES['image']['tmp_name']);
				$check_imagelist = getimagesize($_FILES['image_list']['tmp_name']);

				if($check !== false && $check_imagelist !== false){
					$allowUpload = true;
				}else{
					$allowUpload = false;
				}

				if ($_FILES['image']['size'] > $maxFileType && $_FILES['image_list']['size'] > $maxFileType) {
					$allowUpload = false;
				}

				if(!in_array($imageFileType, $allowType ) ){
					echo "Chi được upload file PNG JPG JPEG";
					$allowUpload = false;
				}

				if($allowUpload){
					$product = $_POST;
					$product['image'] = $name;
					
					for($i = 0; $i < $countItems; $i++){
						$product['image_list'] .= $image_name[$i].',';
					}
					$check_add_product = parent::add_product_new($product);
					if($check_add_product == TRUE){
						for($i = 0; $i < $countItems; $i++){
							move_uploaded_file($tmp_image_name[$i], $path.$image_name[$i]);
						}
						move_uploaded_file($tmp_name, $path.$name);
						echo "<script>alert('Them san pham thanh cong !')</script>";
						echo "<script type='text/javascript'>
						           window.location = './all_list'
						      </script>";

					}else{
						echo "<script>alert('Them san pham khong thanh cong!')</script>";
						echo '<script>history.go(-1)</script>';
					}
				}

				
			}else{
				echo "<script>alert('Vui long dien day du thong tin!')</script>";
				echo '<script>history.go(-1)</script>';
			}
		}

		public function all_list(){
			$rows = parent::admin_all_list_product();
			$categories = parent::admin_all_list_categories();
			$subCategories =  parent::admin_all_list_subCategories();
			$count = count($rows);
			$paginate = new PaginateModel;
			$limit = 8;
			$start = $paginate->findStart($limit);
			$pages = $paginate->findPages($count,$limit);
			$config = array('range'=>3,
				'total_page'=> $pages,
				'total_record'=>$count,
				'start'=>$start,
				'current_page'=> isset($_GET['page']) ? $_GET['page'] : 1
			);
			$paginate->init($config);
			$product = parent::admin_product_with_limit($start, $limit);
			require('admin/views/product/all_list.php');
		}

		public function search($keyword){
			$categories = parent::admin_all_list_categories();
			$subCategories = parent::admin_all_list_subCategories();
			$rows = parent::admin_all_list_keyword($keyword);
			$paginate = new PaginateModel;
			if(!empty($rows)){
				$count = count($rows);	
			}else{
				$count = 0;
			}
			
			$limit = 8;
			$start = $paginate->findStart($limit);
			$pages = $paginate->findPages($count,$limit);
			$url = explode("page=", $_GET['s']);
			$config = array('range'=>3,
				'total_page'=> $pages,
				'total_record'=>$count,
				'start'=>$start,
				'current_page'=> !isset($url[1]) ? 1:$url[1]
			);
			$paginate->init($config);
			$product = parent::admin_list_product_with_limit($keyword, $start, $limit);
			require('admin/views/product/search.php');
		}

	}
 ?>