<?php
require_once '../core/database/Connection.php';

     require_once '../core/classes/comment.php';
$con = Connection::makeConnection();
//sql
$sql = "SELECT * FROM comments WHERE pid = '22'";
$res = mysqli_query($con, $sql);
$numRows = mysqli_num_rows($res);
if ($numRows > 0) {
	while($data = mysqli_fetch_object($res)){
		echo "<pre>";
	var_dump($data);
	echo "</pre>";
}
}

?>