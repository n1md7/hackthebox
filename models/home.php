<?php
class HomeModel extends Model{
	public function Index(){
		$csrf = Generate::csrf();
		return [
			'csrf' => $csrf
		];
	}

	public function Ajax(){

		header('Content-type: application/json');

		// $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$post = $_POST;

		if( !isset($post['action'])){
			Encode::json([
					'status' => 'error',
					'msg' => ':)'
				]);
		}

		if( $_SESSION['csrf'] !== $post['csrf'] ){
			Encode::json([
				'status' => 'error',
				'msg' => 'CSRF Token is Invalid'
			]);
		}

		switch ($post['action']) {
			case 'search':
				if( !isset($post['search']) || empty($post['search'])){
					Encode::json([
						'status' => 'error',
						'msg' => 'Empty field detected'
					]);			
				}

				$search = $post['search'];
				$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				if ($conn->connect_error){
					Encode::json([
						'status' => 'error',
						'msg' => 'Connection error'
					]);
				}
				$output = array();
				$search = $post['search'];
				
				$sql = mysqli_query($conn, "SELECT * FROM books WHERE title LIKE '$search%' ORDER BY 1 DESC LIMIT 50");

			    while($row = mysqli_fetch_assoc( $sql )) {
			        array_push($output, $row);
			    }

				Encode::json([
					'status' => 'success',
					'data' => $output
				]);
				break;
			
			default:
				Encode::json([
					'status' => 'error',
					'msg' => 'No data'
				]);
				break;
		}
	}
}



