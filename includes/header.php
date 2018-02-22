<?php 
	if(isset($_GET['logout'])){
		require_once ('class/login.php');
		$registration = new Registration();
		$registration->user_logout();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	
	
	<title>Book Hut :: Share your books here</title>
</head>
<body>
	
	<div class="container top-bar">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  menu">
				<nav class="navbar navbar-inverse navbar-fixed-top header">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="background-color: #4682B4;">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="homePage.php"><img src="images/bhlogo.png" alt="BookHut" class="image-responsive"></a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="homePage.php"><i class="fas fa-home" title="Home"></i><span class="sr-only">(current)</span></a></li>
								<li><a href="category_news.php"><i class="fab fa-facebook-messenger" title="MSG"></i></a></li>
								<li><a href="#"><i class="fas fa-bell" title="NotiFication"></i></a></li>
								<li><a href="bookupload.php"><i class="fas fa-cloud-upload-alt" title="BookUp"></i></a></li>
								<li id="search"><a><i class="fas fa-search" title="Search"></i></a></li>
								<li><a href="?logout=logout"><i class="fas fa-sign-out-alt" title="LogOut"></i></a></li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container-fluid -->
					<div class="search-field" > 						
						<form method="get" name="searchform" action="http://www.google.com/search" target="_blank"> 						    
							<input type="text" name="sitesearch" size="30" placeholder="Search books..."> 
							<input type="submit" class="btn btn-success" value="Search" title="Search"> 		
						</form> 					
					</div>
				</nav>
			</div>
		</div>
	</div>