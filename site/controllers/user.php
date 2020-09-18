<?php 
	/**
	 * 
	 */
	require('site/model/user.php');
	class UserController extends UserModel
	{
		public function index(){

			if(!isset($_SESSION['user'])){
				require('site/views/user/login.php');
			}else{
				require('site/viewsuser/index.php');
			}

		}

		public function login(){

			if(!isset($_SESSION['user'])){
				$emailValue = '';
				$emailErr ='';

				if(!empty($_POST)){
					$emailValue = $_POST['email'];
					if($_POST['email'] == NULL || $_POST['password'] == NULL){
						
						require('site/views/user/login.php');
					}
					else{
						$kt = TRUE;
						$userController = new UserController;
						$email = $userController->test_data($_POST['email']);
						if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
							$emailErr = "Invalid email format";
							$emailValue = '';
							$kt = FALSE;
						}
						
						if($kt == TRUE){
							$user = array(
								'email' => $_POST['email'],
								'password' => md5($_POST['password'])
							);

							$check = parent::check_login($user);

							if($check == FALSE){

								echo "<script>alert('Sai tài khoản hoặc mật khẩu')</script>";
								if(isset($_POST['pointer-login-to-buy'])){

									require('site/views/cart/add.php');
								}
								else{

									require('site/views/user/login.php');
								}

							}

							else{

							$_SESSION['user'] = $check;
							if(isset($_POST['checkbox']) && $_POST['checkbox'] == 'on'){
								setcookie('user_name', $_SESSION['user']['name'], time()+(7*24*36000),"/","");
								setcookie('user_password', $_SESSION['user']['password'], time()+(7*24*3600),"/","");
								setcookie('user_level', $_SESSION['user']['level'], time() + (7*24*3600), "/","");
							}
							if( isset($_POST['pointer-login-to-buy'] )){

								require('site/views/cart/add.php');
							}else{

								echo "<script>window.location.href='..'</script>";	
							}			
						}
						
					}else{
						if(isset($_POST['pointer-login-to-buy'])){

							require('site/views/cart/add.php');
						}else{

							require('site/views/user/login.php');
						}
					}
		
					}
				}	
				else{
					if(isset($_POST['pointer-login-to-buy'])){

						require('site/views/cart/add.php');
					}
					else{

						require('site/views/user/login.php');	
					}
				}
			}
			else{	
				header("Location: ..");		
			}
		}

		public static function register(){

			if(isset($_SESSION['user'])){

				header('Location ..');
			}
			else
			{
				$firstnameValue = $lastnameValue = $emailValue = $phoneValue = '';
				$firstNameErr = $lastNameErr = $emailErr = $phoneErr = '';
				//$firstname = $lastname = $email = $phone = '';
				
				//form goi di co du lieu
				if(!empty($_POST)){
					$firstnameValue = $_POST['firstname'];
					$lastnameValue = $_POST['lastname'];
					$phoneValue = $_POST['phone'];
					$emailValue = $_POST['email'];
					
					if($_POST['firstname'] == null || $_POST['lastname'] == null || $_POST['email'] == null || $_POST['phone'] == null || $_POST['password'] == null || $_POST['confirmPassword'] == null){

						//echo "<script>alert('khong duoc de trong thong tin')</script>";
						require('site/views/user/register.php');
					}
					else{

						$check = true;
						$userController = new UserController;
						$firstname = $userController->test_data($_POST['firstname']);
						if(!preg_match("/^[a-zA-Z ]*$/", $firstname)){
							$firstNameErr = "Only letters and space allowed";
							$firstnameValue = '';
							$check = false;
						}

						$lastname = $userController->test_data($_POST['lastname']);
						if(!preg_match("/^[a-zA-Z ]*$/", $lastname)){
							$lastNameErr = "Only letters and space allowed";
							$lastnameValue = '';
							$check = false;
						}

						$email = $userController->test_data($_POST['email']);
						if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
							$emailErr = "Invalid email format";	
							$emailValue = '';
							$check = false;
						}else{

							$kt = parent::register_email($_POST['email']);
							if($kt != false){
								$emailErr = "Email da ton tai,vui long chon email khac!";
								$emailValue ='';
								$check = false;

							}
						}

						$phone =$userController->test_data($_POST['phone']);
						if(!preg_match("/^[0-9]{10}+$/", $phone)){

							$phoneErr = "Invalid phone number";
							$check = false;
							$emailValue='';
						}

						if($_POST['password'] != $_POST['confirmPassword']){

							$check = false;
						}

						if($check == true){

							$user = array(
								'name' => $_POST['firstname'].' '.$_POST['lastname'],
								'password' => md5($_POST['password']),
								'email' => $_POST['email'],
								'phone' => $_POST['phone'],
								'level'=> 0
							);	
							parent::register_user($user);
							$_SESSION['user'] = $user;
							echo "<script>alert('Dang ky thanh cong!')</script>";
							if (isset($_POST['pointer-register-to-buy'])) {
								require('site/views/cart/add.php');
							}else{
								require('site/views/home/index.php');
							}
						}else{
							if(isset($_POST['pointer-register-to-buy'])){

								require('site/views/cart/add.php');
							}else{

								require('site/views/user/register.php');
							}		
						}					
					}
				}else{
					require('site/views/user/register.php');                      
				}
			}
		}

		public static function test_data($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		public static function logout(){

			if(isset($_SESSION['user'])){
				unset($_SESSION['user']);
				setcookie('user_name', $_SESSION['name'], time()-1,"/","");
				setcookie('user_password', $_SESSION['password'], time() -1 , "/" ,"");
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}
			else{
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}

		}
	}
 ?>