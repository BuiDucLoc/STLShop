<?php 
	/**
	 * 
	 */
	require('admin/models/home.php');
	class HomeController extends HomeModel
	{
		public function index(){
			require('admin/views/home/index.php');		
		}
		
	}
 ?>