<?php 
	session_start();
	if (isset($_SESSION['userId'])) {
		header('Location: homePage.php');
	}
	require_once 'class/login.php';
	$message ="";
	if(isset($_POST['btn'])){
			
		$registration = new Registration();
		$message = $registration->save_user_info($_POST);
	}

	if(isset($_POST['loginBtn'])){			
		$login = new Registration();
		$login->check_user_info($_POST);
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
	<link rel="stylesheet" href="css/loginStyle.css">
	
	
	<title>Book Hut :: Share your books here</title>
</head>
<body>
	<div class="container-fluid wrapper">
		<div class="row top-bar">
			<nav class="navbar navbar-default header">
			  	<div class="container-fluid">
			    	<div class="navbar-header">
			      		<a class="navbar-brand" href=""><img src="images/bhlogo.png" alt="logo"></a>
			    	</div>
			  	</div>
			</nav>
		</div>
	</div>

	<div class="container content-body">
		<div class="row">
			<div class="col-md-12">
				<div class="well">
					<form class="form-horizontal login-form" action="" method="post">
						<h3 class="text-center text-success"><?php echo $message ;?></h3>
						<br>
						<h3 class="text-center">Log into BookHut</h3>
						<br>
					    <div class="form-group">
						    <div class="col-md-offset-3 col-md-6">
						        <input type="email" class="form-control"  placeholder="Email" name="email" required>
						    </div>
					    </div>
					    <div class="form-group">
						    <div class="col-md-offset-3 col-md-6">
						        <input type="password" class="form-control"  placeholder="Password" name="password" required>
						    </div>
					    </div>
						<div class="form-group">
							<div class="col-md-offset-3 col-md-6">
							  	<div class="checkbox">
									<label>
								  		<input type="checkbox"> Remember me
									</label>
							  	</div>
							</div>
					  	</div>
					    <div class="form-group">
						    <div class="col-md-offset-3 col-md-6">
						        <button type="submit" class="btn btn-primary btn-block" name="loginBtn"><b>Log In</b></button>
						    </div>
					    </div>
						<p class="text-center"><b>----------------------- or -----------------------</b></p>
						<br>
					    <div class="form-group">
						    <div class="col-md-offset-4 col-md-4">
						        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal"><b>Create New Account</b></button>
						    </div>
					    </div>
						<a href="#"><p class="text-center">Forgot account?</p></a>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
	    <div class="row">
	        <div class="footer col-md-12">
	            <p class="text-center">&copy; 2018 Book Hut. All Rights Reserved | By LazyWarriors</p>
	        </div>
	    </div>
	</div>

	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal">&times;</button>
		            <h4><span class="fa fa-user-plus"></span> SignUp</h4>
		        </div>
		        <div class="modal-body">
		            <form role="form" method="post" action="">
		            	<div class="form-group">
		              		<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
		            	</div>
			            <div class="form-group">
			              	<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
			            </div>
			            <div class="form-group">
			              	<input type="email" class="form-control" id="email" name="email" placeholder="Email" required >
			            </div>
			            <p id = "result"></p>
			            <div class="form-group">
			              	<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
			            </div>
			            <div class="form-group">
			              	<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required onkeyup="validate()">
			            </div>
			            
			            <p id="res"></p>
			            
			            <div class="form-group">
			              	<select name="gender" id="gender" class="form-control" required>
			              		<option value="">--- Select Gender ---</option>
			              		<option value="0">Male</option>
			              		<option value="1">Female</option>
			              	</select>
			            </div>
			            <br>
			            <button type="submit" class="btn btn-success btn-block" name="btn" id="btn"><span class="fa fa-user-plus"></span> Sign Up</button>
		          	</form>
		        </div>
		        <div class="modal-footer">
		          	<button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
		        </div>
		    </div>
	    </div>
	</div>

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script src="js/jquerylib.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/modernizr-custom.js"></script> 
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> -->

	<script>
		$(function(){
		    $("#myBtn").click(function(){
		        $("#myModal").modal();

		    });
		    
		    
		});

		function validate() {
			var x= document.getElementById("password");
			var y= document.getElementById("confirmPassword");
			if(x.value==y.value){
				var res = document.getElementById("res");
				res.style.color = "green";
				res.innerHTML = "Password matched";
			}
			else {
				var res = document.getElementById("res");
				res.style.color = "red";
				res.innerHTML = "Password did not match";		
			};
		};
		$(document).ready(function(){
			$("#email").keyup(function(){
				var email = $(this).val();
				$.ajax({
					url: 'class/email.php',
					datatType : 'text',
					method: 'POST',
					data: {
						email:email,
					},
					success:function(data)
					{
						var result = data;
						var res = $("#result");
						var btn = $("#btn");


						if (result == "Taken"){

							res.css("color", "red");
							res.html("Email already taken");
							btn.prop('disabled',true);	
						}
						else{
							res.css("color", "green");
							res.html("Email address available");
							btn.prop('disabled',false);
						}

					}
				});
				
			});
		});

		
	</script>
</body>
</html>