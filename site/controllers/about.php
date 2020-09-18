<?php 
	/**
	 * 
	 */
	class AboutController
	{
		public function index(){
			require('site/views/about/index.php');
		}

		public static function chinh_sach_quy_dinh(){
			require('site/views/about/chinh_sach_quy_dinh.php');
		}

		public static function chinh_sach_doi_tra(){
			require('site/views/about/chinh_sach_doi_tra.php');
		}

		public static function chinh_sach_bao_mat(){
			require('site/views/about/chinh_sach_bao_mat.php');
		}

		public static function chinh_sach_van_chuyen(){
			require('site/views/about/chinh_sach_van_chuyen.php');
		}

		public static function chinh_sach_bao_hanh(){
			require('site/views/about/chinh_sach_bao_hanh.php');
		}
	}
 ?>