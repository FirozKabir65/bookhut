<?php
// session_start();
require_once ('class/user.php');
require_once ('class/postStatus.php');
require_once ('class/comment.php');

$userProfile = new UserProfile();
$img = $userProfile->user_image();

$status = new Status();
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}else{
	$page=0;
}
$post = $status->show_post($page);
// $post = mysqli_fetch_assoc($post);
// echo "<pre>";
// print_r($post);
// die();

$paginate = $status->pagination();
$comment = new Comment();

if(isset($_POST['btn'])){
	$storeComment = $comment->store_comment($_POST);
}

if(isset($_GET['status'])){
	$id = ($_GET['id']);
	$delete = $comment->delete($id);
}


?>
<!--Header start-->
<?php include('includes/header.php');?>
<!--Header end-->

	<div class="container content-body">
		<div class="row">
			<!-- sidebar start -->
			<?php include('includes/sideBar.php');?>
			<!-- sidebar end -->

			<div class="main-content col-lg-offset-1 col-lg-8 col-md-offset-1 col-md-8 col-sm-offset-1 col-sm-7 col-xs-7">

				<!-- book info show section start -->
				<?php while($res=mysqli_fetch_assoc($post)){ ?>
				<div class="row homepage-row">

					<div class="col-md-12">
						<div class="media">
							<div class="media-left">

								<img class="post-user" src="<?php if(isset($res['profileImage'])){
									echo $res['profileImage'];
								}else{
									echo 'images/userImages/default_user_img.jpg';
								} ?>" alt="user">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h4><?php echo $res['firstName'].' '.$res['lastName'];?></h4><br>
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
						<img class="img-responsive book-img" src="<?php if(isset($res['bookImage'])){
									echo $res['bookImage'];
								}else{
									echo 'images/bookImages/book.jpg';
								} ?>" alt="book-img">
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
				<?php }?>

				<!-- comment section start -->

				<div class="row comments">
					<ul>
						<li><a href="#"><i class="fas fa-2x fa-heart" title="Like"></i></a></li>
					</ul><br>
					<div class="well">
						<img class="user-comment-image" src="<?php echo $img ;?>" alt="">&nbsp;
						<span>
							<form class="form-group comments-input" method="post" action="">
								<input type="number" name="bookId" value="<?php echo $res['id'];?>" style='display: none;'>
								<input type="number" name="userId" value="<?php echo $_SESSION['userId']?>" style='display: none;'>
								<textarea name="comment" id="" cols="60" rows="3" placeholder="Add a comment..." class="form-control"></textarea>
								<button class="glyphicon glyphicon-send btn btn-info" type="submit" title="Submit" name="btn"></button>
							</form>
						</span>

						<?php
						$showComment = $comment->show_comment($res['id']);
						while($allComments = mysqli_fetch_assoc($showComment)){ 

							?>
							
							<img class="commentators-image" src="<?php if(isset($allComments['profileImage'])){ echo $allComments['profileImage']; }else{ echo 'images/userImages/default_user_img.jpg';}?>" alt="">&nbsp; <span><b><?php echo $allComments['firstName'].' '.$allComments['lastName'];?></b></span><br>
							<small class="user-comments"><?php if(isset($allComments['comment'])){
								echo $allComments['comment'];
							}?></small><br><br>

							<?php if ($_SESSION['userId']== $allComments['id']) { ?>
							<input type="hidden" value="<?php echo $allComments['commentId']?>">

							<a href="" class="btn btn-success">Edit</a>
							<a href="?status=delete&&id=<?php echo $allComments['commentId']?>" class="btn btn-danger">Delete</a>
							<br><br>
							<?php } ?>
							<?php } ?>
						</div>
					</div>
					<!-- comment section end -->
					<hr>
					<?php } ;?>
					<!-- book info show section end -->

					<div class="pagination">
						<?php 
						for($i=1; $i<=$paginate; $i++){
							print("<li><a href=?page=".$i."> ".$i." </a></li>");
						}
						?>
					</div>
				</div>
			</div>
		</div>


		<!--Footer start-->
		<?php include('includes/footer.php');?>
		
		
	</body>

	</html>