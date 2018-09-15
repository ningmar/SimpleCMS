<?php 
session_start();
require_once '../core/database/Connection.php';
require_once '../core/classes/posts.php';

if((isset($_SESSION['uid'])) && $_SESSION['uid'] != '') {
?>
<?php

     include 'includes/head.php';
     include 'includes/navigation.php';

?>
<div class="container-fluid">
<form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
<button class="btn btn-primary" style="float: right;"><a href="add_new_post.php" style="color: white; text-decoration: none;">Add New</a>
</button>
This is articels page 
<table class="table table-hover">
  <thead>
    <tr>
      <th>S.N</th>
      <th></th>
      <th>Articles</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>

    <?php
       $posts = new Post();
       $articles = $posts->selectCat(1,'articles');//take data from data
       foreach ($articles as $article) {
    ?>
      <th></th>
      <td><img src="<?= $article['image'];?>" style="width: 150px; height: 100px;"></td>
      <td>
        <strong><?= $article['title']; ?></strong><br>
        <small><?= substr($article['description'], 0, 100)?></small>  
      </td>
      <td>
        <button><a target="blank" href="../post.php?title=<?= $article['title']; ?>&post_id=<?= $article['post_id']; ?>">View</a></button>
        <button><a href="add_new_post.php?post_id=<?= $article['post_id'];?>">Edit</a></button>
        <button><a href="process/postprocess.php?post_id=<?= $article['post_id'];?>">Delete</a></button>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>
<?php include 'includes/footer.php'; ?>
<?php }else{
  // echo "erorororor";
  header('location:login.php');
}
?>