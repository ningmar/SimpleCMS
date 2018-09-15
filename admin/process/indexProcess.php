<?php 
require_once '../core/database/Connection.php';
require_once '../core/classes/posts.php';
require_once '../core/classes/comment.php';
require_once '../core/classes/user.class.php';

//fetching subscriber
$subs = new User();
$subscribers = $subs->fetchAllSubscriber();
//pageview for now
$pageview = 0;
$posts= new Post();
$postes = $posts->selectView();
foreach ($postes as $post) {
	$pageview = $pageview + $post['hit'];
}
return $pageview;
?>