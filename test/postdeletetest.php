<?php

 require_once '../core/database/Connection.php';
 require_once '../core/classes/posts.php';

$delobj = new posts();
$delobj->setPost_Id(5);
if($delobj->delete()){
	echo "deleted like a thug";
}
else{
	echo "You cannot delete me";
}
?>