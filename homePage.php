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
	        <div class="col-md-12 menu">
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
	                        <a class="navbar-brand" href="homePage.html"><img src="images/bhlogo.png" alt="BookHut" class="image-responsive"></a>
	                    </div>
	                    <!-- Collect the nav links, forms, and other content for toggling -->
	                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                        <ul class="nav navbar-nav navbar-right">
	                            <li><a href="homePage.html"><i class="fas fa-home" title="Home"></i><span class="sr-only">(current)</span></a></li>
	                            <li><a href="category_news.php"><i class="fab fa-facebook-messenger" title="MSG"></i></a></li>
	                            <li><a href="#"><i class="fas fa-bell" title="NotiFication"></i></a></li>
	                            <li><a href="bookupload.php"><i class="fas fa-cloud-upload-alt" title="BookUp"></i></a></li>
	                            <li><a href="#"><i class="fas fa-search" title="Search"></i></a></li>
	                            <li><a href="#"><i class="fas fa-sign-out-alt" title="LogOut"></i></a></li>
	                        </ul>
	                    </div>
	                    <!-- /.navbar-collapse -->
	                </div>
	                <!-- /.container-fluid -->
	            </nav>
	        </div>
	    </div>
	</div>

	<div class="container content-body">
	    <div class="row">
	        <div class="left-sidebar col-md-3">
	           <div class="row">
	              <div class="pro_pic">
	                <a href="index.html"><img src="images/templateImages/man.jpg" title="pro_pic"></a>
	                <h3>Bruce Wayne</h3>
	              </div>
	           </div>
	           <div class="row">
	                <div class="col-md-offset-3 col-md-6 col-md-offset-3 view-profile">
	                    <button type="btn" class="btn btn-info">View Profile</button>
	                </div>
	                <div class="col-md-offset-3 col-md-6 col-md-offset-3 edit-profile">
	                    <button type="btn" class="btn btn-info">Edit Profile</button>
	                </div>
	           </div>
	        </div>
	        <div class="main-content col-md-offset-1 col-md-8">
	            <div class="row homepage-row">
	                <div class="col-md-12">
	                	<div class="media">
	                		<div class="media-left">
	                			<img class="post-user" src="images/templateImages/man.jpg" alt="user">
	                		</div>
	                		<div class="media-body">
	                			<div class="media-heading">
	                				<h4>Bruce Wayne</h4><br>
	                				<p>Posted on March 05 '13</p>
	                			</div>
	                		</div>
	                	</div>
	                </div>
	            </div>

                <div class="row homepage-book-row">
                    <div class="col-md-5">
            			<img class="img-responsive book-img" src="images/templateImages/1.jpg" alt="book-img">
            		</div>
            		<div class="col-md-7">
        				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore porro repudiandae ducimus rem expedita sapiente, quae, atque iste quis beatae animi libero voluptatum sint doloribus voluptates maiores eligendi amet reprehenderit.</p>
            		</div>
        		</div>
        		<button class="glyphicon glyphicon-cloud-download btn btn-primary" type="button" title="Download" style="margin-left: 15px;"></button>
        		<button class="glyphicon glyphicon-edit btn btn-success" type="button" title="Edit"></button>
        		<button class="glyphicon glyphicon-trash btn btn-danger" type="button" title="Delete"></button>

				<div class="row comments">
        		    <ul>
        		        <li><a href="#"><i class="fas fa-2x fa-heart" title="Like"></i></a></li>
        		    </ul><br>
        		    <div class="well">
        		        <img class="user-comment-image" src="images/templateImages/man.jpg" alt="">&nbsp;
        		        <span>
        		            <form class="form-group comments-input">
    		                    <textarea name="commnet" id="" cols="60" rows="3" placeholder="Add a comment..." class="form-control"></textarea>
	        		            <button class="glyphicon glyphicon-send btn btn-info" type="button" title="Submit" ></button>
        		            </form>
        		        </span>
        		        
        		        
        		        <img class="commentators-image" src="images/templateImages/man.jpg" alt="">&nbsp; <span><b>user-name</b></span><br>
        		        <small class="user-comments">comments</small><br><br>
        		        <a href="" class="btn btn-success">Edit</a>
        		        <a href="" class="btn btn-danger">Delete</a>
        		    </div>
        		</div>
        		<hr>

        		<div class="pagination">
        		    <li><a href="#">1</a></li>
        		    <li class="active"><a href="#">2</a></li>
        		    <li><a href="#">3</a></li>
        		    <li><a><span>....</span></a></li>
        		    <div class="clear"> </div>
        		</div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="footer col-md-12">
            	<ul class="text-center">
            		<li>
            			<a href="google.com">About Us</a>
            		</li>
            		<li>|</li>
            		<li>
            			<a href="faq.php">FAQ</a>
            		</li>
            	</ul>
            	<hr>
                <p class="text-center">&copy; 2018 Book Hut. All Rights Reserved | By LazyWarriors</p>
            </div>
        </div>
    </div>          


    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="js/jquerylib.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/modernizr-custom.js"></script> 
</body>

</html>