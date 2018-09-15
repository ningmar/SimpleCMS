<?php

    require_once '../core/database/Connection.php';
    require_once '../core/classes/user.class.php';

    $user = new User();
    $username = 'admin';
    $password = 'admin';

    $user->setUsername($username);
    $user->setPassword($password);
    
    if ($user->loginAdmin()) 
    {
    	echo "Logged in as ".$_SESSION['username'];
    }
    else{
    	echo "couldnot logged in ";
    }

?>