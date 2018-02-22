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

		public function show_post($page){
			if($page=="" || $page == 1){
				$page = 0;
			}
			else{
				$page = (($page * 5) - 5);
			}
			$sql = "SELECT b.id, b.userId, u.firstName, u.lastName, b.created_at, b.bookAuthor, b.bookName, b.bookImage, b.bookDescription, b.bookPath, i.profileImage, i.userId FROM tbl_book b JOIN tbl_user u ON b.userId = u.id left join tbl_user_image i on b.userId = i.userId order by b.id asc LIMIT $page, 5";

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

		public function pagination(){
			$run = "SELECT * FROM tbl_book";
			$sql_result = mysqli_query($this->connection,$run);
			$count = mysqli_num_rows($sql_result);
			$a = ceil($count/5);
			if($a){
				return $a;
			}
			else{
				die('query problem');
			}
		}
	}		 