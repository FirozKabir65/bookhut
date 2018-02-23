<?php 
	require_once ('class/login.php');

	$registration = new Registration();
	$userLoginInfo = $registration->user_info($_SESSION['userId']);
?>



<div class="left-sidebar col-lg-3 col-md-3 col-sm-4 col-xs-5">
	<div class="row">
		<div class="pro_pic">

			<a href="index.html"><img src="<?php echo $img ;?>" title="pro_pic"></a>
			<h3><?php echo $userLoginInfo['firstName'].' '.$userLoginInfo['lastName']?></h3>
		</div>
	</div>
	<div class="row buttons text-center">
		<div class="view-profile">
			<a href="viewProfile.php?id=<?php echo $_SESSION['userId']?>"><button type="btn" class="btn btn-info">View Profile</button></a>
		</div>
		<div class="edit-profile">
			<a href="editProfile.php?id=<?php echo $_SESSION['userId']?>"><button type="btn" class="btn btn-info">Update Profile</button></a> 
		</div>
	</div>
</div>