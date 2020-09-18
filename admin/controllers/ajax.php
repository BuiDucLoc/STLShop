<?php 
	/**
	 * 
	 */
	class AjaxController extends MasterModel
	{
		public function sub_categories(){
			if(isset($_POST['category'])){
				$category = $_POST['category'];
				$sub_categories = parent::get_list_subCategories($category);
				if(count($sub_categories) > 0){
					foreach ($sub_categories as $items) {
						$sCate .= "<option value = '".$items['id']."'>".$items['name']."</option>";
					}
					echo $sCate;
				}
			}else{
				header('Loaction: ..');
			}
		}
	}
 ?>

