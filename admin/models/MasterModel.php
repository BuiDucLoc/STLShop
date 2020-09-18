<?php 
	/**
	 * 
	 */
	class MasterModel
	{
		public function get_list_categories(){
			$query = "SELECT * FROM categories ORDER BY id ASC";
			$results = mysqli_query( Database::$dbc, $query );
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				
				while($data = mysqli_fetch_array($results,MYSQLI_ASSOC)){
					$rows[]=$data;
				}
				if(!empty($rows)){
					return $rows;
				}

			}
		}

		public function get_list_subCategories($sub_categories_id){
			$query = "SELECT * FROM sub_categories WHERE parent_id = {$sub_categories_id} ORDER BY id ASC";
			$results = mysqli_query(Database::$dbc, $query);
			if(!$results){
				return die("Query{$query}\n<br>"."MYSQLI ERROR:".mysqli_error(Database::$dbc));
			}else{
				while($data = mysqli_fetch_array($results, MYSQLI_ASSOC)){
					$row[] = $data;
				}
				if(!empty($row)){
					return $row;
				}
			}
		}

		public function add_product_into_database($product){
			$query = "INSERT INTO product (name, price, image_link, image_list, description, categories_id, categories_parent, discount,numberProduct, hightlights) VALUES ( '{$product['name']}', '{$product['price']}', '{$product['image']}' , '{$product['image_list']}', '{$product['description']}', '{$product['subcategories']}', '{$product['categories']}',0,'{$product['number']}',0) ";

			$results = mysqli_query(Database::$dbc, $query);

			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}else{
				return TRUE;
			}
		}

		public function get_all_from($table, $option = array()){
			$select = isset($option['select'])? $option['select']: '*';
			$where = isset($option['where']) ? 'WHERE '.$option['where'] : '';
			$order_by = isset($option['order_by']) ? 'ORDER BY '.$option['order_by']:'';

			if(isset($option['offset']) && isset($option['limit'])){
				$limit = 'LIMIT '.$option['offset'].','.$option['limit'];
			}else{
				if(isset($option['limit'])){
					$limit = 'LIMIT '.$option['limit'];
				}else{
					$limit = '';
				}
			}

			$query = "SELECT $select FROM $table $where $order_by $limit";

			$results = mysqli_query(Database::$dbc, $query);

			if(!$results){
				return die("QUERY{$query}\n<br>MYSQLI ERROR:".mysqli_error(Database::$dbc));
			}else{
				while($data = mysqli_fetch_array($results, MYSQLI_ASSOC)){
					$row[] = $data;
				}
				if(!empty($row)){
					return $row;
				}
			}
		}

		public function list_product_with_limit($start, $limit){
			$query = "SELECT * FROM product ORDER BY id DESC LIMIT $start, $limit";

			$results = mysqli_query(Database::$dbc, $query);
			if(!$results){
				return die("QUERY{$query}\n<br>MYSQLI ERROR:").mysqli_error(Database::$dbc);
			}else{
				while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
					$rows[] = $data;
				}
				if(!empty($rows)){
					return $rows;
				}
			}
		}

		public function find_product_by_key_word($table,$keysearch){

			$query = "SELECT * FROM $table WHERE name LIKE '%$keysearch%' ORDER BY id DESC";
			$results= mysqli_query(Database::$dbc,$query);
			if(!$results){
				return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
			}
			else{
				
				while($data = mysqli_fetch_array($results,MYSQLI_ASSOC)){
					$rows[]=$data;
				}
				if(!empty($rows)){
					return $rows;
				}

			}

		}

		public function search_product_with_limit($table,$keyword, $start, $limit){
			$query = "SELECT * FROM $table WHERE name LIKE '%$keyword%' ORDER BY id DESC LIMIT $start, $limit";

			$results = mysqli_query(Database::$dbc, $query);
			if(!$results){
				return die("QUERY{$query}\n<br>MYSQLI ERROR:".mysqli_error(Database::$dbc));
			}else{
				while($data = mysqli_fetch_array($results, MYSQLI_ASSOC)){
					$rows[] = $data;
				}
				if(!empty($rows)){
					return $rows;
				}
			}
		}

		
	}
 ?>