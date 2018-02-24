<?php
	class Comment {
		protected $connection;
		public function __construct(){
			$hostname = "localhost";
			$username = "root";
			$password = "";
			$dbname = "db_bookhut";
			$this->connection = mysqli_connect($hostname, $username, $password, $dbname);
			 if(!$this->connection){
				 die('connection Fail');
			 }
			 else {
			 	// echo"connected";
			 }

		}

		public function store_comment($data){

			$userId = $data['userId'];
			$bookId = $data['bookId'];
			$comment = $data['comment'];

			$sql = "INSERT INTO tbl_comment (userId,bookId,comment) VALUES ('$userId','$bookId','$comment')";
			$sql_result = mysqli_query($this->connection,$sql);
			if($sql_result){
				return $sql_result;
			}
			else {
				die('query problem');
			}
		

		}

		public function show_comment($bookId){
			$sql = "SELECT b.id, c.id as commentId, c.created_at, c.bookId, c.comment, u.firstName, u.lastName, u.id, i.userId, i.profileImage FROM tbl_comment c JOIN tbl_book b ON c.bookId = b.id join tbl_user u ON c.userId = u.id left join tbl_user_image i on c.userId = i.userId where c.bookId='$bookId' order by c.created_at ASC";
			$sql_result = mysqli_query($this->connection,$sql);
			
			if($sql_result){
				return $sql_result;
			}
			else {
				die('query problem');
			}
		}

		public function delete($id){
			$sql = "DELETE FROM tbl_comment WHERE id ='$id'";

			$sql_result = mysqli_query($this->connection,$sql);
			
			if($sql_result){
				header("Location: homepage.php");
			}
			else {
				die('query problem');
			}

		}

		public function update_comment($data){
			$id = $data['commentEdit'];
			$comment = $data['comment'];
			// print_r($data);
			// exit();
			$sql = "UPDATE tbl_comment SET comment='$comment' WHERE id ='$id'";
			$sql_result = mysqli_query($this->connection,$sql);
			if($sql_result){
				header("Location: homepage.php");
			}
			else {
				die('query problem');
			}


		}
	}		
