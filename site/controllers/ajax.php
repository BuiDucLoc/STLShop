<?php
	
	class AjaxController{
		public function delete_cart(){
			if(isset($_POST['pos'])){
				$position = $_POST['pos'];
				unset($_SESSION['product'][$position-1]);
			}
			else{
				require('404.php');
			}
		}
	}
?>