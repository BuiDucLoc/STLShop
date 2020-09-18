<?php 
	/**
	 * 
	 */

	class CartModel extends MasterModel
	{
		public static function update_cart($customer_info, $cart_info){
			return parent::update_two_table($customer_info, $cart_info);
		}
	}
 ?>