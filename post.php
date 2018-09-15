<?php
if(isset($_GET['title']) && isset($_GET['post_id'])){
$title = $_GET['title'];
$pid = $_GET['post_id'];
include 'includes/head.php';
include 'includes/navigation.php';

     require_once 'core/database/Connection.php';
     require_once 'core/classes/posts.php';
     require_once 'core/classes/comment.php';
?>
<div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
<?php
     $post = new Post();
     $post->setTitle($title);
     //for page view
     $post->setPost_Id($pid);
     $post->pageView();
     $posts = $post->selectOne();
     // echo "<pre>";
     // var_dump($post);
     // echo "</pre>";
     foreach ($posts as $post) {
   ?>
     	<h1><strong><?= $post['title'];?></strong></h1>
     	<img src="<?= $post['image']; ?>" style="width: 70%;">
     	<p><?= $post['description'];?></p>
     	<p>Post by <?= $post['author'];?> on <?= $post['post_time'];?></p>
   <?php  }
?>
<!-- now comment section if any -->
<form action="post.php?title=<?= $post['title']; ?>&post_id=<?= $post['post_id']; ?>" method="post">
    <textarea rows="3" name="comment" style="width: 50%;" placeholder="Comments here but login to comment" required></textarea>
    <?php
        if (isset($_SESSION['username'])) { ?>
            <button type="submit" name="submit">Comment</button>
    <?php    }
    ?>
</form>


<!-- now to take comment -->
<?php
if (isset($_POST['submit'])) {

    $comm = $_POST['comment'];
    $comment = new Comment();
    $comment->setPId($pid);
   
    $comment->setComment($comm);
    $commentor = $_SESSION['username'];
    $comment->setCommentor($commentor);
    if(!$comment->comment()){
        echo "errors";
        // header('location:index.php?error='.base64_encode('Some error has occured'));
    } //this wii do the work
}
?>
<!-- showing comment -->
<div class="well">
    <?php 

     require_once 'core/database/Connection.php';
     require_once 'core/classes/comment.php';
    $commen = new Comment();
    $commen->setPId($pid);
    $comments = $commen->fetchAll();
    if($comments == true){
     foreach ($comments as $comment) { ?>
         
      <strong><?= $comment['commentor'];?></strong>
     <p><?= $comment['comment'];?></p>
     <p><?= $comment['comment_time'];?></p> 
      <?php
  }
      } ?>
     
</div>

                  </div>
          </div>
</div>
<?php include 'includes/footer.php'; } //else{
	// header('location:index.php');
// }
$commen->close(); ?> 