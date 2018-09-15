<?php
session_start();
require_once '../../core/database/Connection.php';
require_once '../../core/classes/posts.php';

if (isset($_SESSION)) {
	if (isset($_GET['post_id'])) {
		$post_id = $_GET['post_id'];
		$post = new Post();
		$post->setPost_Id($post_id);
		if($post->delete()){
			$success = base64_encode('Donot regret.. Permanently deleted');
			header('location:../index.php?success='.$success);
		}else{
			$error= base64_encode('Error Permanentlydeleting');
			header('location:../index.php?success='.$error);
		}
	}
}else{
	header('location:../login.php');
}

?>