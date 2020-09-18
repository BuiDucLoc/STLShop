<?php 
	class MasterModel{
		//Module all view
		public function get_all_from($table,$option = array()){
			/**
			*Ham lay tat ca record trong table thoa man dieu kien $option
			*/
			$select = isset($option['select'])? $option['select']: '*';
			$where = isset($option['where'])? 'WHERE '.$option['where']: '';
			$order_by = isset($option['order_by'])? 'ORDER BY '.$option['order_by']:'';

			if(isset($option['offset']) && isset($option['limit'])){
				$limit = 'LIMIT '.$option['offset'].','.$option['limit'];	
			}else 
				if( isset($option['limit'])){
				$limit = 'LIMIT '.$option['limit'];
				}else{
				$limit = '';
			}
			

			$query = "SELECT $select FROM $table $where $order_by $limit";
			$result = mysqli_query(Database::$dbc,$query);

			if(!$result){
				return die("Query{$query}\n<br/> MYSQL error:".mysqli_error(Database::$dbc));
			}else{

				while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
					$row[] = $data;
				}

				if(!empty($row)){
					return $row;
				}

			}
		}
		//Module single view
		public function get_a_record_by_id($table,$id,$select = '*'){
			intval($id);
			$query = "SELECT $select FROM $table WHERE id = $id";
			$result = mysqli_query(Database::$dbc,$query);

			if(!$result){
				return die("Query{$query}\n<br/>MYSQL ERROR:".mysqli_error(Database::$dbc));
			}else{

				while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
					$row[] = $data;
				}

				if(!empty($row)){
					return $row;
				}
			}
		}
		//Module Category
		public function get_list_by_category($table,$categories_id, $select='*'){
			$query = "SELECT $select FROM $table WHERE categories_id = $categories_id";
			$result = mysqli_query(Database::$dbc,$query);

			if(!$result){
				return die("Query{$query}\n<br/>MYSQL ERROR :".mysqli_error(Database::$dbc));
			}else{
				//lay name cua subcategories
				$query_subcate = "SELECT name, parent_id FROM sub_categories WHERE id = $categories_id";
				$result_subcate = mysqli_query(Database::$dbc,$query_subcate);
				$name_subcate = mysqli_fetch_array($result_subcate,MYSQLI_ASSOC); 
			
				if(!$result_subcate){
					return die("Query{$query_subcate}/n<br/>"."MYSQL ERROR".mysqli_error(Database::$dbc));
				}else{

					while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						$row[] = $data;
					}
					if(!empty($row)){
						return array($row,$name_subcate);
					}

				}
			}
		}

		public function search_record($keysearch){
			$query = "SELECT * FROM product WHERE name LIKE '%$keysearch%' ORDER BY id DESC";
			$result = mysqli_query(Database::$dbc,$query);

			if(!$result){
				return die("Query{$query}\n<br/>MYSQL ERROR:".mysqli_error(Database::$dbc));
			}else{

				while ($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
					$row[] = $data;
				}

				if(!empty($row)){
					return $row;
				}

			}
		}

		public function get_record_with_limit($start,$limit,$keysearch){
			$query = "SELECT * FROM product WHERE name LIKE '%$keysearch%' ORDER BY id DESC LIMIT $start,$limit";

			$results = mysqli_query(Database::$dbc, $query);
			if(!$results){
				return die ("Query{$query}\n</br>MYSQLI ERROR:".mysqli_error(Database::$dbc));
			}else{

				while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
					$rows[] = $data;
				}
				if(!empty($rows)){
						return $rows;
					}
			}
		}

		public function list_comment($post_id){
			$query = "SELECT product_comments.id, product_comments.content, product_comments.created, user.name FROM product_comments, user WHERE product_comments.id_product = $post_id and product_comments.id_user = user.id ORDER BY product_comments.id DESC";
			$result = mysqli_query(Database::$dbc,$query);
			if(!$result){
				return die("Query{$query}\n<br/>MYSQLI ERROR:".mysqli_error(Database::$dbc));
			}else{

				while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
					$row[] = $data;
				}

				if(!empty($row)){
					return $row;
				}

			}
		}

		public function insert_comment($comment){
			$query = "INSERT INTO product_comments(id_product,id_user,content,created)
					VALUES ('".$comment['id_product']."','".$comment['id_user']."','".$comment['content']."','".$comment['created']."')";
			$result = mysqli_query(Database::$dbc,$query);
			if(!$result){
				return die("Query{$query}\n<br/>MYSQLI ERROR:".mysqli_error(Database::$dbc));
			}else{
				return TRUE;
			}
		}

		public function check_user($user){

			$query = "SELECT * FROM user WHERE email = '{$user['email']}' and password = '{$user['password']}'";

			$result = mysqli_query(Database::$dbc,$query);

			if(!$result){
				return false;
			}else{
				$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
				return $data;
			}

		}

		public function register_user($user){
			$query = "INSERT INTO user(name,email,password,phone,level)
					  VALUES('".$user['username']."','".$user['email']."','".$user['password']."','".$user['phone']."','".$user['level']."','0')";
			$result = mysqli_query(Database::$dbc,$query);

			if(!$result){
				return false;
			}else{
				$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
				return $data;
			}

		}

		public function add_user($user){

			$query = " INSERT INTO user (name, email, password, phone, level, created) 
        		VALUES ( '" .$user["name"]. "', '" .$user["email"]. "', '" .$user["password"]. "', '" .$user["phone"]. "', '0','1'  ) ";
        	$results = mysqli_query( Database::$dbc, $query );

        	if(!$results){
        		return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        	}
        	else{
        		return true;
        	}

		}

		public function update_two_table($customer_info, $cart_info){

			$current_time = date('Y-m-d H:i:s', time());
			$customer_query = " INSERT INTO orders (user_name, user_email, user_phone, user_address, created) 
        		VALUES ( '" .$customer_info["name"]. "', '" .$customer_info["email"]. "', '" .$customer_info["phone"]. "', '".$customer_info['address']."','".$current_time."'  ) ";

			$customer_result = mysqli_query(Database::$dbc, $customer_query);

			if(!$customer_result){
				return die("QUERY:{$customer_query}\n<br/>MYSQLI ERROR:".mysqli_error(Database::$dbc));
			}else{

				$cart_query = "SELECT * FROM orders WHERE user_name = '{$customer_info['name']}' and user_email = '{$customer_info['email']}'  and user_phone = '{$customer_info['phone']}' and user_address = '{$customer_info['address']}' and created = '{$current_time}'  ";

				$cart_result = mysqli_query(Database::$dbc, $cart_query);

				if(!$cart_query){
					return die("Query:{$cart_query}\n<br/>MYSQLI ERROR:".mysqli_error(Database::$dbc));
				}else{
					$data = mysqli_fetch_array($cart_result, MYSQLI_ASSOC);
					$order_id = $data['id'];

					for( $i=1;$i<=count($cart_info['id']); $i++ ){
						$query = "INSERT INTO order_detail (order_id, product_id, qty) VALUES ('{$order_id}','{$cart_info['id'][$i]}','{$cart_info['number'][$i]}')";
						$results = mysqli_query( Database::$dbc, $query );

					}
					return TRUE;
				}
			}
		}

		public static function check_email($email){
			$query = "SELECT * FROM user WHERE email = '{$email}'";

			$results = mysqli_query(Database::$dbc, $query);

			if(!$results){
				return false;
			}
			else{
				while($data = mysqli_fetch_array($results, MYSQLI_ASSOC)){
					$row = $data;
				}
				if(!empty($row)){
					return $row;
				}
			}
		}

		public static function get_categories_name($categories_id){
			$query = "SELECT * FROM categories WHERE parent_id = '{$categories_id}'";

			$results = mysqli_query(Database::$dbc, $query);

			if(!$results){
				return die ("Query{$query}\n<br/>MYSQLI ERROR:".mysqli_error(Database::$dbc));
			}else{
				while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
					$row[] = $data;
				}
				if(!empty($row)){
					return $row;
				}
			}
		}

	}
 ?>