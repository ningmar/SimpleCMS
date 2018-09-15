<?php
 require_once '../core/database/Connection.php';
 require_once '../core/classes/posts.php';

 $obj = new Post();
 $obj->setPost_Id(6);
$obj->setTitle('This is the last title');
$obj->setDescription('This is a last and final and full and finaldumy updated scary and amazing stories and description what so ever');
$obj->setImage('fullllimasacre.jpg');
// $obj->setAuthor('dummy author');
// $obj->setComment_Id(3);

// $obj->insert();
if($obj->edit()){
	echo 'what the heck';
} else{
	var_dump($obj->edit());
} //didot work properly


?>