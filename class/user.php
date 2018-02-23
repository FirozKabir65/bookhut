<?php

session_start();
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
			// print_r($data);
			// exit();
		$id = $data['id'];
		$profession = $data['profession'];
		$favouriteBooks = $data['favouriteBooks'];
		$favouriteWriters = $data['favouriteWriters'];
		$interests = $data['interests'];
		$address = $data['address'];
		$dir = $_FILES['profileImage']['name'];

		if($dir = $_FILES['profileImage']['name']){
			$sql_profile = "INSERT INTO tbl_user_profile (userId,profession,favouriteBooks, favouriteWriters, interests, address) VALUES('$id','$profession','$favouriteBooks','$favouriteWriters','$interests','$address')";
			$sql_result1 = mysqli_query($this->connection,$sql_profile);
			$profile = $this->save_profile_image();
			$sql_image = "INSERT INTO tbl_user_image (userId,profileImage) VALUES('$id','$profile')";
			$sql_result2 = mysqli_query($this->connection,$sql_image);

		}else {

			$sql_profile = "INSERT INTO tbl_user_profile (userId,profession,favouriteBooks, favouriteWriters, interests, address) VALUES('$id','$profession','$favouriteBooks','$favouriteWriters','$interests','$address')";
			$sql_result1 = mysqli_query($this->connection,$sql_profile);
		}

		header('Location: homePage.php');


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

	public function user_image(){
			// session_start();
		$res = $_SESSION['userId'];
		$sql = "SELECT * FROM tbl_user_image WHERE userId = '$res'";
		$sql_result = mysqli_query($this->connection,$sql);
		$user_img = mysqli_fetch_assoc($sql_result);

		if($user_img){

			// $res = $_SESSION['profileImage'] = $user_img['profileImage'];
			$res = $user_img['profileImage'];
			return $res;
		}
		else {
			$res = 'images/userImages/default_user_img.jpg';
			return $res;
		}
	}

	public function update_user_info($data){
		$id = $data['id'];
		$firstName = $data['firstName'];
		$lastName = $data['lastName'];
		$profession = $data['profession'];
		$favouriteBooks = $data['favouriteBooks'];
		$favouriteWriters = $data['favouriteWriters'];
		$interests = $data['interests'];
		$address = $data['address'];
		$dir = $_FILES['profileImage']['name'];

		//image update if value not null
		if($dir = $_FILES['profileImage']['name']){

			$query_result = mysqli_query($this->connection,"SELECT profileImage FROM tbl_user_image WHERE userId = '$id'");
			$image = mysqli_fetch_assoc($query_result);
			if ($image){
				unlink($image['profileImage']);			
			}
			$profile = $this->save_profile_image();
			
			//update or insert image
			$sql ="SELECT * FROM tbl_user_image where userId='$id'";
			$sql_result = mysqli_query($this->connection,$sql);
			$result = mysqli_fetch_assoc($sql_result);
			
			if(count($result)){
				$sql_image = "UPDATE tbl_user_image SET profileImage = '$profile' WHERE userId='$id'";
				$sql_result2 = mysqli_query($this->connection,$sql_image);	
			}else{
				$sql_image = "INSERT INTO tbl_user_image(profileImage, userId) VALUES('$profile','$id')";
				$sql_result2 = mysqli_query($this->connection,$sql_image);
			}			

		}

		//basic profile update
		$sql_user = "UPDATE tbl_user SET firstName='$firstName', lastName='$lastName' WHERE id='$id'";
		$sql_result = mysqli_query($this->connection,$sql_user);

		//update and insert
		$sql ="SELECT * FROM tbl_user_profile where userId='$id'";
		$sql_result = mysqli_query($this->connection,$sql);
		$result = mysqli_fetch_assoc($sql_result);
		if(count($result)){
			$sql_profile = "UPDATE tbl_user_profile SET profession ='$profession', favouriteBooks='$favouriteBooks', favouriteWriters='$favouriteWriters', interests='$interests', address='$address' where userId='$id'";
			$sql_result1 = mysqli_query($this->connection,$sql_profile);
		}else{
			$sql_profile = "INSERT INTO tbl_user_profile (profession, favouriteBooks, favouriteWriters, interests, address, userId) VALUES('$profession', '$favouriteBooks', '$favouriteWriters', '$interests', '$address', '$id')";
			$sql_result1 = mysqli_query($this->connection,$sql_profile);
		}

		header('Location: homePage.php');

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


