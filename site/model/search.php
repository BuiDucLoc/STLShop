<?php 
	/**
	 * 
	 */
	
	class SearchModel extends MasterModel
	{

		public static function get_record_with_keysearch($key){
			return parent::search_record($key);
		}

		public static function get_all_record_with_limit($start,$limit,$key){
			return parent::get_record_with_limit($start,$limit,$key);
		}

	}
 ?>