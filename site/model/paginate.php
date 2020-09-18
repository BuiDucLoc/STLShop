<?php 
	/**
	 * 
	 */
	class PaginateModel extends MasterModel
	{

		protected $_config = array(
			'min' => 0,
			'max' => 0,
			'range' => 1,
			'total_page' =>1,
			'total_record' => 1,
			'current_page' => 1,
			'start'=>0
		);

		public function init($config = array()){
			//kiem tra thong so $config truyen vao co ton tai trong doi tuong hay khong
			foreach ($config as $key => $value) {
				if(isset($this->_config[$key])){
					$this->_config[$key] = $value;
				}
			}

			//tinh total page
			

			if($this->_config['current_page'] < 1){
				$this->_config['current_page'] = 1;
			}

			if($this->_config['current_page'] > $this->_config['total_page']){
				$this->_config['current_page'] = $this->_config['total_page'];
			}

			$middle = ceil($this->_config['range'] / 2);

			if($this->_config['total_page'] < $this->_config['range']){

				$this->_config['min'] = 1;
				$this->_config['max'] = $this->_config['total_page'];

			}else{

				$this->_config['min'] = $this->_config['current_page'] - $middle +1;
				$this->_config['max'] = $this->_config['current_page'] + $middle -1;

				if($this->_config['min'] < 1){
					$this->_config['min'] = 1;
					$this->_config['max'] = $this->_config['range'];
				}else if ($this->_config['max'] > $this->_config['total_page']) {
					$this->_config['max'] = $this->_config['total_page'];
                	$this->_config['min'] = $this->_config['total_page'] - $this->_config['range'] + 1;
				}

			}
		}
		
		public function findStart($limit){
			if(!isset($_GET['s'])){

				if (!isset($_GET['page']) || $_GET['page'] == 1 || $_GET['page'] < 1) {
					$start = 0;
					$_GET['page'] = 1;
				}else {
					$start =((int)$_GET['page']-1)*$limit;
				}

			}else{
				$url = explode('page=', $_GET['s']);

				if(!isset($url[1]) || $url == 1 ){
					$start = 0;
				}else{
					$start = ((int)$url[1] - 1)*$limit;
				}

			}
			return $start;
		}

		public function findPages($count,$limit){
			$pages = (($count % $limit) == 0) ? ($count / $limit) : ceil($count / $limit);
			if($pages < 0){
				$pages = 1;
			}
			return $pages;
		}

		public function getLink($pages){
			
			//luu lai dia chi trang dung de dieu huong dau cuoi
			$page_link = "";

			$uri_parts = explode('?', $_SERVER['REQUEST_URI'],2);
			
			if(isset($_SESSION['search'])){
				$currentUrl = $uri_parts[0].'?s='.$_SESSION['search'];
			}else{
				$currentUrl = $uri_parts[0];
			}
			
			if($this->_config['current_page'] > 1){
				$page_link .= '<li><a href="'.$currentUrl.'?page='.($this->_config['current_page']-1).'">&laquo;</a></li>';
			}
			for($i = $this->_config['min']; $i <= $this->_config['max']; $i++){

				if($this->_config['current_page'] == $i){
					$page_link .= "<li class='active'><span>".$i."</span></li>";// Nếu là trang hiện tại thì bỏ đường link, in đậm và chỉ hiện thị con số của trang
				}
				else{
					$page_link .= '<li><a href="'.$currentUrl.'?page='.$i.'" title="Trang '.$i.'">'.$i.'</a></li>';
				}	
			}
			if($this->_config['current_page'] < $pages){
				$page_link .= '<li><a href="'.$currentUrl.'?page='.($this->_config['current_page'] + 1).'">&raquo;</a></li>';
			}
			return $page_link;
		}
	}
 ?>