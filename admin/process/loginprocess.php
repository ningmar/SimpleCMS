<?php

require_once '../../core/database/Connection.php';
require_once '../../core/classes/user.class.php';

if (isset($_POST['submit'])) {
	$con = Connection::makeConnection();
	$username = (isset($_POST['username']))?mysqli_real_escape_string($con, $_POST['username']):'';
	$pass = (isset($_POST['password']))?mysqli_real_escape_string($con, $_POST['password']):'';
	$hashed = hash('sha256', $pass);//hashing and encrypting
	$salt = '$a1S0J2k9'; //salting
	$password = $salt.$hashed.$salt;

	$suser = new User();
	$suser->setUsername($username);
	$suser->setPassword($password);

	if ($suser->loginAdmin()) { 
		// $_SESSION['username'];
		// $_SESSION['uid'];
		$success = base64_encode('You are successfully logged in');
		header('location:../index.php?success='.$success);//with success massage
	} 
	else 
	{
		// echo "couldnot connect";
		$error = base64_encode('Invalid Username And Password');
		header('location:../login.php?error='.$error);
	}
} 
else
{
	// echo "not submitted";
	$error = base64_encode('Illegal Access');
	header('location:../login.php?error='.$error);//with error massage 
}

?>