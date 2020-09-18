<?php 
 	/**
 	 * 
 	 */
 	class NewsModel extends MasterModel
 	{
 		public static function get_all_news(){
 			return parent::get_all_from('news');
 		}

 		public static function get_all_with_limit($start, $limit){
 			return parent::get_all_from('news', array('offset'=>$start,'limit'=>$limit));
 		}

 		public static function get_all_news_latest($lm){
 			return parent::get_all_from('news', array('order_by'=>'date DESC','limit'=>$lm));
 		}
 	}
 ?>