<?php 
	/**
	 * 
	 */
	require('site/model/product.php');
	require('site/model/paginate.php');
	class ProductController extends ProductModel{ 


		public function index(){
			$categories = parent::__contruct();
			
			$row = parent::get_all();
			if(!empty($row)){
				$count = count($row);	
			}else{
				$count = 0;
			}
			$paginate = new PaginateModel;
			$limit = 12;
			$start = $paginate->findStart($limit);
			$pages = $paginate->findPages($count,$limit);
			$config = array('range'=>3,
				'total_page'=> $pages,
				'total_record'=>$count,
				'start'=>$start,
				'current_page'=> isset($_GET['page']) ? $_GET['page'] : 1
			);
			$paginate->init($config);
			//phan trang
			
			
			
			
			$results_bestSellers = parent::get_all_best_seller($hightlights = 0);
			$results = parent::get_all_with_limit($start,$limit);
			require('site/views/product/index.php');
		}
		
		//ham view xem chi tiet san pham
		public function view($id){
			$categories = parent::__contruct();
			$id = (int)$id;
			$row =  parent::get_by_id($id);

			$image_list = explode(',', $row[0]['image_list']);
			$results_bestSellers = parent::get_all_best_seller($hightlights = 0);
			$_SESSION['product_detail'] = 'yes';
			$_SESSION['breadcrumb_detail'] = 'yes';			


			$paginate = new PaginateModel;
			$more_product = parent::get_list($row[0]['categories_id']);
			$limit = 4;
			$start = $paginate->findStart($limit);
			$count = count($more_product[0]);
			
			//bien chua ket qua de hien thi len view
			$result_paginate = parent::get_list_with_limit($start,$limit,$row[0]['categories_id']);


			//hien thi danh sach comment co san trc do
			$limit_comment = 2;
			$list_comment = parent::get_list_comment($id);

			if (!empty($list_comment)) {
				$count = count($list_comment);
			}else{
				$count = 0;
			}
			
			//Them comment moi ve san pham
			if(isset($_POST['content'])){
				$comment = array(
					'id_user'=>$_SESSION['user']['id'],
					'id_product' => $id,
					'content'=>$_POST['content'],
					'created'=> date('Y-m-d',time())
			);
				$result_comment = parent::post_comment($comment);

				if($result_comment == TRUE){
					header('Location: '.$id);
				}else{
					echo "Lỗi";
				}
			}else{
				
			}
			require('site/views/product/view.php');
		}

		//hien thi san pham catalog
		public function all_list($categories_id){
			
			$categories_id = (int)$categories_id;
			
			$row = parent::get_list($categories_id);
			
			$results_bestSellers = parent::get_all_best_seller($hightlights = 0);
			

			//phan trang
			$paginate = new PaginateModel;
			
			$limit = 12;
			$start = $paginate->findStart($limit);
			$count = !empty($row[0]) ? count($row[0]) : 0;
			$pages = $paginate->findPages($count,$limit);
			$config = array('range'=>3,
				'total_page'=> $pages,
				'total_record'=>$count,
				'start'=>$start,
				'current_page'=> isset($_GET['page']) ? $_GET['page'] : 1
			);
			$paginate->init($config);
			

			
			$results = parent::get_list_with_limit($start,$limit,$categories_id);
			require('site/views/product/list.php');
		}

		public function product_by_cate($categories_id){
			$results_bestSellers = parent::get_all_best_seller($hightlights = 0);
			$row = parent::get_categories_parent($categories_id);
			$paginate = new PaginateModel;
			$limit = 12;
			$count = !empty($row) ? count($row) : 0;
			$start = $paginate->findStart($limit);
			$pages = $paginate->findPages($count, $limit);
			$config = array(
				'current_page' => isset($_GET['page']) ? $_GET['page'] : 1,
				'start' => $start,
				'total_record' => $count,
				'total_page' => $pages,
				'range' => 3
			);

			$paginate->init($config);

			$results = parent::get_all_list($start, $limit, $categories_id);
			require('site/views/product/list.php');
		}
		public function bestSaller(){
			$limit = 12;
			$bestSeller = parent::get_all_best_seller($hightlights = 0);
			$paginate = new PaginateModel;
			$start = $paginate->findStart($limit);
			$count = count($bestSeller);
			$pages = $paginate->findPages($count, $limit);
			$results_bestSellers = parent::get_all_best_seller($hightlights = 0);
			$results = parent::get_product_best_seller_with_limit($start, $limit, $hightlights = 0);
			require('site/views/product/listBestSeller.php');
		}

		public function discount(){
			require('site/views/product/giam_gia.php');
		}
	}
?>