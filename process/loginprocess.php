<?php

require_once '../core/database/Connection.php';
     // require_once 'core/classes/posts.php';
     // require_once 'core/classes/comment.php';
require_once '../core/classes/user.class.php';
$con = Connection::makeConnection();

if (isset($_POST['login'])) {
	$username = (isset($_POST['username']))?mysqli_real_escape_string($con, $_POST['username']):'';
	$pass = (isset($_POST['password']))?mysqli_real_escape_string($con, $_POST['password']):'';
	$hashed = hash('sha256', $pass);//hashing and encrypting
	$salt = '$a1S0J2k9'; //salting
	$password = $salt.$hashed.$salt;

	$cuser = new User();
	$cuser->setUsername($username);
	$cuser->setPassword($password);

	if ($cuser->loginUser()) { 
		// $_SESSION['username'];
		// $_SESSION['uid'];
		$success = base64_encode('You are successfully logged in');
		header('location:../index.php?success='.$success);//with success massage
	} 
	else 
	{
		// echo "couldnot connect";
		$error = base64_encode('Invalid Username And Password');
		header('location:../index.php?error='.$error);
	}
} 
else
{
	// echo "not submitted";
	$error = base64_encode('Illegal Access');
	header('location:../index.php?error='.$error);//with error massage 
}