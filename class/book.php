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
			$bookImage=$this->save_book_image();
			$bookName = $data['bookName'];
			$bookCategoryId = $data['bookCategoryId'];
			$bookAuthor = $data['bookAuthor'];
			$bookDescription = $data['bookDescription'];

			$sql = "INSERT INTO tbl_book (bookPath, bookName, bookCategoryId,bookAuthor, bookDescription,bookImage) VALUES ('$bookPath','$bookName','$bookCategoryId','$bookAuthor','$bookDescription','$bookImage')";
			$sql_result = mysqli_query($this->connection,$sql);

			if($sql_result){
				$message = "Book info save successfully";
				return $message;
			}
			else {
				die('query problem');
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