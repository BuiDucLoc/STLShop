<?php 
	/**
	 * 
	 */
	
	class UserModel extends MasterModel
	{
		public  function check_login($user){
			return parent::check_user($user);
		}

		public  function register_user($user){
			return parent::add_user($user);
		}

		public  function register_email($email){
			return parent::check_email($email);
		}
	}
 ?>