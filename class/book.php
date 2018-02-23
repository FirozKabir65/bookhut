<?php
	class Book {
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

		public function book_category_info (){
			$sql = "SELECT * FROM tbl_book_category";
			$sql_result = mysqli_query($this->connection,$sql);
			if($sql_result){
				return $sql_result;
			}
			else {
				die('query problem');
			}
		}


		public function save_book_info($data){

			$bookPath=$this->save_book_pdf();
			
			$userId = $data['userId'];
			$bookName = $data['bookName'];
			$bookCategoryId = $data['bookCategoryId'];
			$bookAuthor = $data['bookAuthor'];
			$bookDescription = $data['bookDescription'];
			$dir = $_FILES['bookImage']['name'];

			if($dir = $_FILES['bookImage']['name']){
				$bookImage=$this->save_book_image();
				$sql = "INSERT INTO tbl_book (userId,bookPath, bookName, bookCategoryId,bookAuthor, bookDescription,bookImage) VALUES ('$userId','$bookPath','$bookName','$bookCategoryId','$bookAuthor','$bookDescription','$bookImage')";
				$sql_result = mysqli_query($this->connection,$sql);

				if($sql_result){
					$message = "Book info save successfully";
					return $message;
				}
				else {
					die('query problem');
				}

			}	

			else {
				$sql = "INSERT INTO tbl_book (userId,bookPath, bookName, bookCategoryId,bookAuthor, bookDescription) VALUES ('$userId','$bookPath','$bookName','$bookCategoryId','$bookAuthor','$bookDescription')";
				$sql_result = mysqli_query($this->connection,$sql);

				if($sql_result){
					$message = "Book info save successfully";
					return $message;
				}
				else {
					die('query problem');
				}

			}
		}

		public function edit_book_info($id){
			$sql = "SELECT * FROM tbl_book where id = '$id'";
			$sql_result = mysqli_query($this->connection,$sql);
			$result = mysqli_fetch_assoc($sql_result);
			if($result){
				return $result;
			}
			else {
				die('query problem');
			}
		}

		public function update_book_info($data){
			$bookId = $data['id'];
			$bookName = $data['bookName'];
			$bookCategoryId = $data['bookCategoryId'];
			$bookAuthor = $data['bookAuthor'];
			$bookDescription = $data['bookDescription'];
			$dir = $_FILES['bookImage']['name'];
			$bookPath = $_FILES['bookPath']['name'];

			if($dir = $_FILES['bookImage']['name'] && $bookPath = $_FILES['bookPath']['name']){
			//select image
				$query_result = mysqli_query($this->connection,"SELECT bookImage FROM tbl_book WHERE id = '$bookId'");
				$bookImage = mysqli_fetch_assoc($query_result);
				if ($bookImage){
					unlink($bookImage['bookImage']);			
				}
				$image_url=$this->save_book_image();
			//select pdf
				$query_result1 = mysqli_query($this->connection,"SELECT bookPath FROM tbl_book WHERE id = '$bookId'");
				$bookPath = mysqli_fetch_assoc($query_result1);
				if ($bookPath){
					unlink($bookPath['bookPath']);			
				}
				$bookPath = $this->save_book_pdf();
			//update all
				$sql = "UPDATE tbl_book SET bookPath = '$bookPath', bookCategoryId = '$bookCategoryId', bookAuthor = '$bookAuthor', bookDescription = '$bookDescription', bookImage = '$image_url' WHERE id = '$bookId'";
				$sql_result = mysqli_query($this->connection,$sql);
				if($sql_result){
					header('Location: homePage.php');
				}

				else {
					die('query problem');
				}
			}

			elseif ($dir = $_FILES['bookImage']['name']) {
				$query_result = mysqli_query($this->connection,"SELECT bookImage FROM tbl_book WHERE id = '$bookId'");
				$bookImage = mysqli_fetch_assoc($query_result);
				if ($bookImage){
					unlink($bookImage['bookImage']);			
				}
				$image_url=$this->save_book_image();
				$sql = "UPDATE tbl_book SET bookCategoryId = '$bookCategoryId', bookAuthor = '$bookAuthor', bookDescription = '$bookDescription', bookImage = '$image_url' WHERE id = '$bookId'";
				$sql_result = mysqli_query($this->connection,$sql);
				if($sql_result){
					header('Location: homePage.php');
				}

				else {
					die('query problem');
				}
			}
			elseif ($bookPath = $_FILES['bookPath']['name']){
				$query_result1 = mysqli_query($this->connection,"SELECT bookPath FROM tbl_book WHERE id = '$bookId'");
				$bookPath = mysqli_fetch_assoc($query_result1);
				if ($bookPath){
					unlink($bookPath['bookPath']);			
				}
				$bookPath = $this->save_book_pdf();
				$sql = "UPDATE tbl_book SET bookPath = '$bookPath', bookCategoryId = '$bookCategoryId', bookAuthor = '$bookAuthor', bookDescription = '$bookDescription' WHERE id = '$bookId'";
				$sql_result = mysqli_query($this->connection,$sql);
				if($sql_result){
					header('Location: homePage.php');
				}

				else {
					die('query problem');
				}
			}

			else {
				$sql = "UPDATE tbl_book SET bookCategoryId = '$bookCategoryId', bookAuthor = '$bookAuthor', bookDescription = '$bookDescription' WHERE id = '$bookId'";
				$sql_result = mysqli_query($this->connection,$sql);	
			}

			header('Location: homePage.php');
		}

		public function save_book_pdf(){
			
			$pdf = $_FILES['bookPath'];
			$temp_locatn = $_FILES['bookPath']['tmp_name'];
			$pdf_size = $_FILES['bookPath']['size'];
			$check = filesize($temp_locatn);
			$type = pathinfo($_FILES['bookPath']['name'],PATHINFO_EXTENSION);
			$dir = $_FILES['bookPath']['name'];
			$pdf_destination  = 'books/'.$dir;
			
			if($check){
				if(file_exists($pdf_destination)){
					die('File already exists');
				}
				else {
					if($pdf_size > 60000000){
						die('File size is greater than 6mb, it should be less than 6mb');
					}
					else {
						if($type!='pdf'){
							die('Please upload a pdf file');	
						}
						else {
							move_uploaded_file($temp_locatn, $pdf_destination);	
							return $pdf_destination;
						}
					}
				}
			
			}
			else {
				die('Upload a valid  file');
			}
		}
		public function save_book_image(){
			
			$img = $_FILES['bookImage'];
			$temp_locatn = $_FILES['bookImage']['tmp_name'];
			$img_size = $_FILES['bookImage']['size'];
			$check = getimagesize($temp_locatn);
			$type = pathinfo($_FILES['bookImage']['name'],PATHINFO_EXTENSION);
			$dir = $_FILES['bookImage']['name'];

			$destination  = 'images/bookImages/'.$dir;


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