<?php
require_once '../core/database/Connection.php';
require_once '../core/classes/posts.php';

$obj = new posts();
$obj->setTitle('This is the dummy title');
$obj->setDescription('This is a dummy description what so ever');
$obj->setImage('dummy.jpg');
$obj->setAuthor('dummy author');
$obj->setComment_Id(3);

// $obj->insert();
if (!$obj->add()) {
	echo "some sort of error";
} else {
	echo "Data are inseted successfully";
}
// $con = Connection::makeConnection();
// //sql
// $sql = "SELECT * FROM login";
// $res = mysqli_query($con, $sql);
// $numRows = mysqli_num_rows($res);
// if ($numRows > 0) {
// 	while($data = mysqli_fetch_object($res)){
// var_dump($data);
//     }
    
// }
?>