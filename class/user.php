<?php

	class UserProfile {

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

		public function store_user_profile($data){

			$id = $data['id'];
			$firstName = $data['firstName'];
			$lastName = $data['lastName'];
			$id = $data['id'];
			$profession = $data['profession'];
			$favouriteBooks = $data['favouriteBooks'];
			$favouriteWriters = $data['favouriteWriters'];
			$interests = $data['interests'];
			$address = $data['address'];

			$sql_user = "UPDATE tbl_user SET firstName='$firstName', lastName='$lastName' WHERE id='$id'";

			$sql_result = mysqli_query($this->connection,$sql_user);
			
			// if($sql_result){
			// 	// return $sql_result;
			// }
			// else {
			// 	die('query problem');
			// }

			$sql_profile = "INSERT INTO tbl_user_profile (userId,profession,favouriteBooks, favouriteWriters, interests, address) VALUES('$id','$profession',$favouriteBooks','$favouriteWriters','$interests','$address')";

			$sql_result1 = mysqli_query($this->connection,$sql_profile);
			
			// if($sql_result1){
			// 	return $sql_result1;
			// }
			// else {
			// 	die('query problem');
			// }
			$profileImage = $this->save_profile_image();

			$sql_image = "INSERT INTO tbl_user_image (userId,profileImage) VALUES('$id','$profileImage')";

			$sql_result2 = mysqli_query($this->connection,$sql_image);
			
			// if($sql_result2){
			// 	return $sql_result2;
			// }
			// else {
			// 	die('query problem');
			// }


		}

		public function show_user_profile($id){
			$sql = "SELECT * FROM tbl_user_profile where userId='$id'";
			$sql_result = mysqli_query($this->connection,$sql);
			
			if($sql_result){
				$res = mysqli_fetch_assoc($sql_result);
				return $res;
			}
			else {
				die('query problem');
			}
		}


		public function save_profile_image(){
			$img = $_FILES['profileImage'];
			$temp_locatn = $_FILES['profileImage']['tmp_name'];
			$img_size = $_FILES['profileImage']['size'];
			$check = getimagesize($temp_locatn);
			$type = pathinfo($_FILES['profileImage']['name'],PATHINFO_EXTENSION);
			$dir = $_FILES['profileImage']['name'];

			$destination  = 'images/userImages/'.$dir;


			if($check){
				if(file_exists($destination)){
					die('File already exists');
				}
				else {
					if($img_size > 6000000){
						die('File size is greater than 6mb, it should be less than 6mb');
					}
					else {
						if($type!='PNG' && $type!='jpg' && $type!='jpeg'){
							die('Please upload jpg or png or jpeg');	
						}
						else {
							move_uploaded_file($temp_locatn, $destination);	
							return $destination;
						}
					}
				}
			
			}
			else {
				die('Upload a valid image file');
			}
		}
	}


?>