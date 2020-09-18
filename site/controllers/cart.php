<?php 
	/**
	 * 
	 */
	require('site/model/cart.php');
	class CartController extends CartModel
	{
		public function index(){
			//kiem tra nut them vao gio hang dda duoc click chua?
				if(( isset( $_POST['call-cart'] ) || isset( $_POST['buy-now'])) && ( count($_POST) > 0 && count($_POST) == 8 && $_SESSION['product_detail'] == 'yes')){

					$_SESSION['product_detail'] = 'no';

				if( !isset( $_SESSION['product'] ) ){
					$_SESSION['product'][] = $_POST;
				}else{
					$check = TRUE;
					foreach ( $_SESSION['product'] as $item ) {

						if( intval($item['id']) == intval($_POST['id']) ){	
							$check = FALSE;
						}
				}
				if( $check == TRUE )
				{
					$_SESSION['product'][] = $_POST;
				}
			}
		}
			
			$total = 0; 
			$i = 0;
			if(isset($_SESSION['product'])){
				$cart = $_SESSION['product'];
				
			}else{
				$cart = null;
			}

			if(isset($_POST['update-cart'])){
				$i = 1;
				$number = $_POST['number'];
				//$color = $_POST['color'];
				//$size = $_POST['size'];
				foreach ($cart as $item) {
					$cart[$i-1]['number'] = $number[$i];
					$_SESSION['product'][$i-1]['number'] = $number[$i];
					//$cart[$i-1]['color'] = $color[$i];
					//$cart[$i-1]['size'] = $size[$i];
					$i++;
				}
			}

			//nut dat hang duoc click
			if(isset( $_POST[ 'add-into-bill' ]) ){

				$_SESSION['bill'] = $_POST;
 				require('site/views/cart/add.php');
			
			}else if( isset( $_POST [ 'call-cart' ] ) ){

				header('location: product/view/'.$_POST['id']);
			}
			else{
				
				require('site/views/cart/index.php');
			}


	}

		public function add(){

			if( isset($_POST ) && isset($_SESSION['bill']) ){

				$customer = $_POST;
				$cart_info = $_SESSION['bill'];

				$update = parent::update_cart($customer,$cart_info);
				if($update == TRUE){

					unset($_SESSION['bill']);
					unset($_SESSION['product']);
					echo "<script>alert('Đặt hàng thành công')</script>";
					echo "<script>window.location.href='.'</script>";
				}

			}
			else{
				header('Location: .');
			}

		}

	}
 ?>