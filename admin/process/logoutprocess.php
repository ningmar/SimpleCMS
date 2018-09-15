<?php

   require_once '../../core/database/Connection.php';
   require_once '../../core/classes/user.class.php';
   
   $user = new User();
   
      if(isset($_SESSION['uid']) && $_SESSION['uid'] != '') // if(isset($_SESSION['username']) && $_SESSION['username'] != '')
      {
         
         $user->logout();
         $success = base64_encode('You are successfully logout');
         header('location: ../login.php?success='.$success);
      }
      else {
         // echo "Log out error";
         $error = base64_encode('Access Denied! Trying to access illegal page');
         header('location: ../login.php?error='.$error); //
      }
?>