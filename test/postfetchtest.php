<?php

 require_once '../core/database/Connection.php';
 require_once '../core/classes/posts.php';

 $fetchobj = new posts();

 // $posts = $fetchobj->select();
 // foreach ($posts as $post) {
 // 	echo $post['title']."<br>";
 // 	echo $post['description']."<br>"." -- ".$post['author']."<br>";
 // }

 // $posts = $fetchobj->selectCat('articles');
 // foreach ($posts as $post) {
 // 	echo $post['title']."<br>";
 // 	echo $post['description']."<br>"." -- ".$post['author']."<br>";
 // }



 // $postes = $fetchobj->selectCat('blogslifelessio');
 // foreach ($postes as $post) {
 // 	echo $post['title']."<br>";
 // 	echo $post['description']."<br>"." -- ".$post['author']."<br>";
 // }

?>