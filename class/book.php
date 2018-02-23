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

		public function update_book_if($data){
			if($_FILES['bookImage']['name']){
				$bookId = $data['id'];
				$query_result = mysqli_query($this->connection,"SELECT bookImage FROM tbl_book WHERE id = '$bookId'");
				$bookImage = mysqli_fetch_assoc($query_result);
				unlink($bookImage['bookImage']);
				$image_url=$this->save_book_image();
				// $blog_id = $data['blog_id'];
				$bookName = $data['bookName'];
				$bookCategoryId = $data['bookCategoryId'];
				$bookAuthor = $data['bookAuthor'];
				$bookDescription = $data['bookDescription'];


				$sql = "UPDATE tbl_book SET blog_id = '$blog_id', blog_title = '$blog_title', author_name = '$author_name', blog_description = '$blog_description', blog_image = '$image_url', publication_status = '$publication_status'WHERE blog_id  = '$blog_id'";
				$sql_result = mysqli_query($this->connection,$sql);
				if($sql_result){
					header('Location: manageblog.php');
				}

				else {
					die('query problem');
				}
			}
			else {
				$blog_id = $data['blog_id'];
				$blog_title = $data['blog_title'];
				$author_name = $data['author_name'];
				$blog_description = $data['blog_description'];
				$publication_status = $data['publication_status'];

				$sql = "UPDATE tbl_blog SET blog_id = '$blog_id', blog_title = '$blog_title', author_name = '$author_name', blog_description = '$blog_description', publication_status = '$publication_status'WHERE blog_id  = '$blog_id'";
				$sql_result = mysqli_query($this->connection,$sql);
				if($sql_result){
					header('Location: manageblog.php');
				}

				else {
					die('query problem');
				}
			}

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