<?php
	class Status{
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

		// public function show_post(){
			
		// 	$sql = "SELECT b.id, b.userId, u.firstName, u.lastName, b.created_at, b.bookAuthor, b.bookName, b.bookImage, b.bookDescription, b.bookPath FROM tbl_book b JOIN tbl_user u ON b.userId = u.id";

		// 	$sql_result = mysqli_query($this->connection,$sql);
			
		// 	if($sql_result){
		// 		return $sql_result;
		// 	}
		// 	else {
		// 		die('query problem');
		// 	}
		// }

		public function show_post(){
			
			$sql = "SELECT b.id, b.userId, u.firstName, u.lastName, b.created_at, b.bookAuthor, b.bookName, b.bookImage, b.bookDescription, b.bookPath, c.bookId, c.comment FROM tbl_book b JOIN tbl_user u ON b.userId = u.id JOIN tbl_comment c ON c.bookId = b.id";

			$sql_result = mysqli_query($this->connection,$sql);
			
			if($sql_result){
				return $sql_result;
			}
			else {
				die('query problem');
			}
		}

		public function show_post_by_id($data){
			
			$sql = "SELECT * FROM tbl_book WHERE userId='$data'";

			$sql_result = mysqli_query($this->connection,$sql);
			
			if($sql_result){
				return $sql_result;
			}
			else {
				die('query problem');
			}
		}
	}		 