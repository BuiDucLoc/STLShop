<?php 
	require('site/model/home.php');
	class HomeController extends HomeModel{
		public function index(){
			if(isset($_POST['home1'])){
				require('site/views/home/index.php');
			}
			$all_product = parent::get_all_product();
			for( $i = 0; $i < count($all_product); $i++){
				$product[] = $all_product[$i];
			}
			$homeProductsMostly = parent::get_all_new_products();
			$homeProductsSell = parent::get_all_products_sell();
			
			//$amountOfProductsInBag = parent::get_amount_of_product_in_bag();
			
			require('site/views/home/index.php');
		}
	}
	
 ?>
