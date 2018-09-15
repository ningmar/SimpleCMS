<?php

require_once '../core/database/Connection.php';

if ($conobject=Connection::makeConnection()) {
	echo "success";
}else{
	echo "failed";
}

?>