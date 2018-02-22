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

		public function show_comment(){
			$sql = "SELECT b.id, c.bookId, c.comment, u.firstName, u.lastName, i.profileImage FROM tbl_comment c JOIN tbl_book b ON c.bookId = b.id join tbl_user u ON c.userId = u.id JOIN tbl_user_image i ON i.userId = u.id";

			$sql_result = mysqli_query($this->connection,$sql);
			
			if($sql_result){
				return $sql_result;
			}
			else {
				die('query problem');
			}
		}
	}		
