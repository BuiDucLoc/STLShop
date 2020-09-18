<?php 

	/**
	 * 
	 */
	require('site/model/paginate.php');
	require('site/model/news.php');
	class NewsController extends NewsModel
	{
		public function index(){
			$rows = parent::get_all_news();
			$lm = 2;
			$all_news_latest = parent::get_all_news_latest($lm);
			$paginate = new PaginateModel;
			$limit = 8;
			$start = $paginate->findStart($limit);
			if(!empty($rows)){
				$count = count($rows);
			}else{
				$count = 0;
			}		
			$pages = $paginate->findPages($count,$limit);
			$results = parent::get_all_with_limit($start, $limit);
			require('site/views/news/index.php');
		}

		public function view(){
			//$all_news_latest = parent::get_all_news_latest();
			require('site/views/news/view.php');
		}
	}
 ?>