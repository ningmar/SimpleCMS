<?php
require_once '../core/database/Connection.php';
require_once '../core/database/QueryBuilder.php';

$obj = new QueryBuilder();

$res = $obj->selectAll('posts');
var_dump($res);
?>