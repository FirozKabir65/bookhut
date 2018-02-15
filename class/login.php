<?php
	class Registration {
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

		public function save_user_info($data){
			$firstName = $data['firstName'];
			$lastName = $data['lastName'];
			$email = $data['email'];
			$password = md5($data['password']);
			$gender = $data['gender'];

			$sql = "INSERT INTO tbl_user(firstName,lastName,email,password,gender) VALUES ('$firstName','$lastName','$email','$password','$gender')";

			$sql_result = mysqli_query($this->connection,$sql);

				if($sql_result){
					$message = "Registration completed successfully, please Login!";
					return $message;
				}
				else {
					die('Query problem');
				}
		}


		public function check_user_info($data) {
			$password = md5($data['password']);
			$email = $data['email'];
			$sql = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
			$sql_result = mysqli_query($this->connection,$sql);
			$user_info = mysqli_fetch_assoc($sql_result);
		
			if($user_info){
				session_start();
				$_SESSION['userId'] = $user_info['userId'];
				$_SESSION['userName'] = $user_info['userName'];
				header('Location: homePage.php');
			}
			else {
				header('Location: index.php');

			}

		}

	}
