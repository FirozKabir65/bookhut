<?php
	// session_start();
	$id = $_GET['id'];
	require_once ('class/user.php');
	require_once ('class/postStatus.php');
	require_once ('class/login.php');


	$registration = new Registration();
	$userLoginInfo = $registration->user_info($_SESSION['userId']);

	$status = new Status();
	$userProfile = new UserProfile();
	$img = $userProfile->user_image();
	
	if(isset($id)){
	    $profileInfo = $userProfile->show_user_profile($id);
	    $status = $status->show_post_by_id($id);
	}



?>

<!--Header start-->
<?php include('includes/header.php');?>
<!--Header end-->

	<div class="container content-body">
	    <div class="row">
	    	<!-- userinfo start -->
	        <div class="user-info col-md-offset-1 col-md-10">
	        	<div class="row homepage-row">
	        	    <div class="col-md-12" style="margin-bottom: 30px;">
	        	    	<div class="media">
	        	    		<div class="media-left">
	        	    			<img class="user" src="<?php echo $img ;?>" alt="user">
	        	    		</div>
	        	    		<div class="media-body">
	        	    			<div class="media-heading">
	        	    				<h3><?php echo $userLoginInfo['firstName'].' '.$userLoginInfo['lastName']?></h3><br>
	        	    				<h4>Profession : <?php echo $profileInfo['profession']?></h4>
	        	    			</div>
	        	    		</div>
	        	    	</div>
	        	    </div>
					<hr>
					<div class="row">
						<div class="col-md-offset-1 col-md-3"><h4>Favourite Books :</h4></div>
						<div class="col-md-8"><?php echo $profileInfo['favouriteBooks'];?></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-offset-1 col-md-3"><h4>Favourite Writers :</h4></div>
						<div class="col-md-8"><?php echo $profileInfo['favouriteWriters'];?></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-offset-1 col-md-3"><h4>Interests :</h4></div>
						<div class="col-md-8"><?php echo $profileInfo['interests'];?></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-offset-1 col-md-3"><h4>Address :</h4></div>
						<div class="col-md-8"><?php echo $profileInfo['address'];?></div>
					</div>
					<hr>
					<div class="row col-md-offset-2 col-md-3">

						<a href="editProfile.php?id=<?php echo $_SESSION['userId']?>" class="btn btn-info btn-block">Edit Profile</a>
					</div>
					
	        	</div>
	        </div>

	        <!-- userinfo end -->

	        <div class="main-content col-md-offset-1 col-md-10">
	        	<!-- post start -->
	        	<?php while($result=mysqli_fetch_assoc($status)){?>
	        	<!-- book info show section start -->
	            <div class="row homepage-row">
	                <div class="col-md-12">
	                	<div class="media">
	                		<div class="media-left">
	                			<img class="post-user" src="images/templateImages/man.jpg" alt="user">
	                		</div>
	                		<div class="media-body">
	                			<div class="media-heading">
	                				<h4><?php echo $_SESSION['name'];?></h4><br>
	                				<p>Posted on <?php echo $result['created_at'];?></p>
	                			</div>
	                		</div>
	                	</div>
	                </div>
	            </div>

                <div class="row homepage-book-row">
                	<div class="col-md-12">
                		<b>Book Name: <?php echo $result['bookName'];?></b>
                		<p>Author Name: <?php echo $result['bookAuthor'];?></p>
                		<br>
                	</div>
                    <div class="col-md-5">
            			<img class="img-responsive book-img" src="<?php echo $result['bookImage'];?>" alt="book-img">
            		</div>
            		<div class="col-md-7">
        				<p><?php echo $result['bookDescription'];?></p>
            		</div>
        		</div>
        		<a href="<?php echo $result['bookPath'];?>" download><button class="glyphicon glyphicon-cloud-download btn btn-primary" type="button" title="Download" style="margin-left: 15px;"></button></a>
        		<button class="glyphicon glyphicon-edit btn btn-success" type="button" title="Edit"></button>
        		<button class="glyphicon glyphicon-trash btn btn-danger" type="button" title="Delete"></button>

        		<!-- comment section start -->

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
        		<!-- comment section start -->
        		
        		<hr>
        		<?php };?>
        		<!-- book info show section end -->


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


    <!--Footer start-->
    <?php include('includes/footer.php');?>
    <!--Footer end-->

</body>

</html>