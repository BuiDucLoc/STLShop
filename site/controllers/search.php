<?php 
	/**
	 * 
	 */
	require('site/model/search.php');
	require('site/model/paginate.php');
	class SearchController extends SearchModel 
	{
		public function keyword($key){
			$paginate = new PaginateModel;
			$row = parent::get_record_with_keysearch($key);
			$limit = 8;
			$start = $paginate->findStart($limit);
			if(!empty($row)){
				$count = count($row);	
			}else{
				$count = 0;
			}
			$url = explode('page=', $_GET['s']);
			
			$pages = $paginate->findPages($count,$limit);
			$config = array('range'=>3,
				'total_page'=> $pages,
				'total_record'=>$count,
				'start'=>$start,
				'current_page'=> !isset($url[1]) ?  1 : intval($url[1])
			);
			$paginate->init($config);
			$results = parent::get_all_record_with_limit($start,$limit,$key);
			require('site/views/search/index.php');
		}
	}
 ?>