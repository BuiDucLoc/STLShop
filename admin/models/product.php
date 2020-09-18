<?php 
	/**
	 * 
	 */
	class ProductModel extends MasterModel
	{
		public function list_categories(){
			return parent::get_list_categories();
		}

		public function add_product_new($product){
			return parent::add_product_into_database($product);
		}

		public function admin_all_list_product(){
			return parent::get_all_from('product');
		}

		public function admin_all_list_categories(){
			return parent::get_all_from('categories');
		}

		public function admin_all_list_subCategories(){
			return parent::get_all_from('sub_categories');
		}

		public function admin_product_with_limit($start,$limit){
			return parent::get_all_from('product',array('offset'=>$start,'limit'=>$limit, 'order_by'=>'id DESC'));
		} 

		public function admin_all_list_keyword($keyword){
			return parent::find_product_by_key_word('product',$keyword);
		}

		public function admin_list_product_with_limit($keyword, $start, $limit){
			return parent::search_product_with_limit('product',$keyword, $start, $limit);
		}
	}
 ?>