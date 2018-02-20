<?php 
	require_once 'login.php';

	$email = $_POST['email'];

	$registration = new Registration();
	$result = $registration->email_check($email);

	$userEmail = mysqli_fetch_assoc($result);
	if($userEmail){
		echo "Taken";
	}
	else {
		echo "Available";
	}

