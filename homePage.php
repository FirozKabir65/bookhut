<?php
	session_start();
	
	require_once 'class/postStatus.php';
	require_once 'class/comment.php';
	$status = new Status();
	$status = $status->show_post();
	$comment = new Comment();

	$showComment = $comment->show_comment();
	
	if(isset($_POST['btn'])){
		$storeComment = $comment->store_comment($_POST);
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
	                        <a class="navbar-brand" href="homePage.html"><img src="images/bhlogo.png" alt="BookHut" class="image-responsive"></a>
	                    </div>
	                    <!-- Collect the nav links, forms, and other content for toggling -->
	                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                        <ul class="nav navbar-nav navbar-right">
	                            <li><a href="homePage.html"><i class="fas fa-home" title="Home"></i><span class="sr-only">(current)</span></a></li>
	                            <li><a href="category_news.php"><i class="fab fa-facebook-messenger" title="MSG"></i></a></li>
	                            <li><a href="#"><i class="fas fa-bell" title="NotiFication"></i></a></li>
	                            <li><a href="bookupload.php"><i class="fas fa-cloud-upload-alt" title="BookUp"></i></a></li>
	                            <li id="search"><a><i class="fas fa-search" title="Search"></i></a></li>
	                            <li><a href="#"><i class="fas fa-sign-out-alt" title="LogOut"></i></a></li>
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

	<div class="container content-body">
	    <div class="row">
	        <div class="left-sidebar col-lg-3 col-md-3 col-sm-4 col-xs-5">
	           <div class="row">
	              <div class="pro_pic">
	                <a href="index.html"><img src="images/templateImages/man.jpg" title="pro_pic"></a>
	                <h3>Bruce Wayne</h3>
	              </div>
	           </div>
	           <div class="row buttons text-center">
	                <div class="view-profile">
	                    <a href="viewProfile.php?id=<?php echo $_SESSION['userId']?>"><button type="btn" class="btn btn-info">View Profile</button></a>
	                </div>
	                <div class="edit-profile">
	                   <a href="editProfile.php"><button type="btn" class="btn btn-info">Edit Profile</button></a> 
	                </div>
	           </div>
	        </div>

	        <div class="main-content col-lg-offset-1 col-lg-8 col-md-offset-1 col-md-8 col-sm-offset-1 col-sm-7 col-xs-7">
	         	     
	        	<?php while($res=mysqli_fetch_assoc($status)){;?>
	            <div class="row homepage-row">

	                <div class="col-md-12">
	                	<div class="media">
	                		<div class="media-left">
	                			
	                			<img class="post-user" src="images/templateImages/man.jpg" alt="user">
	                		</div>
	                		<div class="media-body">
	                			<div class="media-heading">
	                				<h4><?php echo $res['firstName'];?></h4><br>
	                				<p>Posted on <?php echo $res['created_at'];?></p>
	                			</div>
	                		</div>
	                	</div>
	                </div>
	            </div>

                <div class="row homepage-book-row">
                	<div class="col-md-12">
                		<b>Book Name: <?php echo $res['bookName'];?></b>
                		<p>Author Name: <?php echo $res['bookAuthor'];?></p>
                		<br>
                	</div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            			<img class="img-responsive book-img" src="<?php echo $res['bookImage'];?>" alt="book-img">
            		</div>
            		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
        				<p><?php echo $res['bookDescription'];?></p>
            		</div>
        		</div>
        		<input type="hidden" value="<?php echo $res['id'];?>">
        		<input type="hidden" value="<?php echo $res['userId'];?>">

        		

        		<a href="<?php echo $res['bookPath'];?>" class="glyphicon glyphicon-cloud-download btn btn-primary" type="button" title="Download" style="margin-left: 15px;"></a>

        		<?php if($_SESSION['userId']== $res['userId']){?>

        		<a href="editBookInfo.php?id=<?php echo $res['id'];?>" class="glyphicon glyphicon-edit btn btn-success" title="Edit"></a>

        		<a href="" class="glyphicon glyphicon-trash btn btn-danger" title="Delete"></a>
        		<?php };?>

				<div class="row comments">
        		    <ul>
        		        <li><a href="#"><i class="fas fa-2x fa-heart" title="Like"></i></a></li>
        		    </ul><br>
        		    <div class="well">
        		        <img class="user-comment-image" src="images/templateImages/man.jpg" alt="">&nbsp;
        		        <span>
        		            <form class="form-group comments-input" method="post" action="">
        		            	<input type="number" name="bookId" value="<?php echo $res['id'];?>">
        		            	<input type="number" name="userId" value="<?php echo $_SESSION['userId']?>">
    		                    <textarea name="comment" id="" cols="60" rows="3" placeholder="Add a comment..." class="form-control"></textarea>
	        		            <button class="glyphicon glyphicon-send btn btn-info" type="submit" title="Submit" name="btn"></button>
        		            </form>
        		        </span>
        		        
        		        
        		        <img class="commentators-image" src="<?php echo $r['profileImage'];?>" alt="">&nbsp; <span><b><?php echo $res['firstName'].' '.$res['lastName'];?></b></span><br>
        		        <small class="user-comments"><?php echo $res['comment'];?></small><br><br>
        		        <a href="" class="btn btn-success">Edit</a>
        		        <a href="" class="btn btn-danger">Delete</a>
        		        <br><br>
        		        
        		    </div>
        		</div>
        		<hr>
        		<?php } ;?>
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
            			<a href="faq.php">FAQs</a>
            		</li>
            	</ul>
            	<hr>
                <p class="text-center">&copy; <?php echo date("Y"); ?> Book Hut. All Rights Reserved | By <i>Iffat, Firoz, Sabi.</i></p>
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

    <script> 	    
		$(document).ready(function(){
		    $(".search-field").hide();
		    $("#search").click(function(){ 	       
		    	$(".search-field").slideToggle();
		    }); 	    
		});   
    </script>
</body>

</html>