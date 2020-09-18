<?php 
	/**
	 * 
	 */
	class ProductModel extends MasterModel
	{
		
		function __contruct(){
			return parent::get_all_from('categories',array('order_by'=>'id DESC'));
		}

		public static function get_all(){
			return parent::get_all_from('product', array('order_by'=>'id DESC'));
		}

		public static function get_by_id($id){
			return parent::get_a_record_by_id('product',$id);
		}

		public static function get_list($categories_id){
			return parent::get_list_by_category('product',$categories_id);
		}

		public static function get_categories_parent($categories_id){
			return parent::get_all_from('product', array('where'=>'categories_parent='.$categories_id));
		}

		public static function get_all_with_limit($start,$limit){
			return parent::get_all_from('product',array('offset'=>$start,'limit'=>$limit));
		} 

		public static function get_all_list($start, $limit, $categories_id){
			return parent::get_all_from('product', array('offset'=>$start, 'limit'=>$limit, 'where'=>'categories_parent='.$categories_id));
		}

		public static function get_list_with_limit($start,$limit,$categories_id){
			return parent::get_all_from('product',array('offset'=>$start,'limit'=>$limit,'where'=>'categories_id ='.$categories_id ));
		}

		public static function get_all_best_seller($hightlights){
			return parent::get_all_from('product',array('where'=>'hightlights >'.$hightlights ));
		}

		public static function get_product_best_seller_with_limit($start, $limit, $hightlights){
			return parent::get_all_from('product', array('offset'=>$start, 'limit'=>$limit, 'where'=>'hightlights > '.$hightlights ));
		}

		public static function categories_name($categories_id){
			return parent::get_categories_name($categories_id);
		}

		public static function get_list_comment($id){
			return parent::list_comment($id);
		}

		public static function post_comment($comment){
			return parent::insert_comment($comment);
		}

	}
 ?>