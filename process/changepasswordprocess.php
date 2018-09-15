<?php

require_once '../core/database/Connection.php';
require_once '../core/classes/user.class.php';

if ($_POST) {
	if (isset($_POST['saveChange'])) {
		$current_password = $_POST['cpassword'];
		$hashed = hash('sha256', $current_password);//hashing and encrypting
	    $salt = '$a1S0J2k9'; //salting 
	    $current_pass = $salt.$hashed.$salt;
	    $session_password = $_SESSION['password'];
	    $newpassword = $_POST['newpassword'];
	    $pass = $_POST['conpassword'];
	    //check old password and entered password
	    if ($session_password == $current_pass) {// if('$a1S0J2k98c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918$a1S0J2k9' == '$a1S0J2k98c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918$a1S0J2k9') 
            if ($newpassword == $pass) {
	    		$npass = hash('sha256', $newpassword);//hashing and encrypting			  
			    $newpass = $salt.$npass.$salt;
			    $user = new User();
			    $user->setPassword($newpass);
                $user->setUserId($_SESSION['uid']);
                $user->changePassword();
                // echo "successful";
                $success = base64_encode('Password successfully changed.');
                header('Location:../index.php?success='.$success); 
		    }
	        else
		    {
		    	$error = base64_encode('Password Mismatched.');
	            header('Location:../index.php?error='.$error);
	    	}
	    }
	    else
	    {
	    	$error = base64_encode('You entered incorrect old password');
            header('Location:../index.php?error='.$error);
	    }
	}//else not submitted
	else
	{
		header('location:../index.php');
	}
} //else not posted
else
{
	header('location:../index.php?error='.base64_encode('Illegal access'));
}
?>