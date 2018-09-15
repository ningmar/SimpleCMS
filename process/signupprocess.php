<?php

require_once '../core/database/Connection.php';
     // require_once 'core/classes/posts.php';
     // require_once 'core/classes/comment.php';
require_once '../core/classes/user.class.php';

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$username =$_POST['username'];
	$password = $_POST['password'];
	$conpass = $_POST['conpassword'];
	$permission = 'subscriber';
	if ($password  == $conpass) {
		$hashed = hash('sha256', $password);//hashing and encrypting
	    $salt = '$a1S0J2k9'; //salting 
	    $pass = $salt.$hashed.$salt;
		$user = new User();
		$user->setEmail($email);
		$user->setUsername($username);
		$user->setPassword($pass);
		$user->setPermission($permission);
		if($user->signup())
		{
			header('location:../signup.php?success='.base64_encode("successfully signup now just login"));
		}
		else{
			header('location:../signup.php?error='.base64_encode("some serious problem"));
		}
	}else{
		header('location:../signup.php?error='.base64_encode("password Mismatched"));
	}
}