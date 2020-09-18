<?php 

	class HomeModel extends MasterModel{
		public static function get_all_new_products(){
			return parent::get_all_from('product',array('offset'=>'0', 'limit'=>'5','order'=>'DESC'));
		}
		public static function get_all_products_sell(){
			return parent::get_all_from('product',array('offset'=>'0','limit'=>'5','order'=>'DESC','where'=>'hightlights = 1'));
		}

		public static function get_all_product(){
			return parent::get_all_from('product');
		}
	}
 ?>