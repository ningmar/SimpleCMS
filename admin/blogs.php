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
<div class="container">

<button class="btn btn-primary" style="float: right;"><a href="add_new_post.php" style="color: white; text-decoration: none;">Add New</a>
</button>
this is blogs page
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
       $blogs = $posts->selectBlogs(1);//take data from data
       foreach ($blogs as $blog) {
    ?>
      <th></th>
      <td><img src="<?= $blog['image'];?>" style="width: 150px; height: 100px;"></td>
      <td>
        <strong><?= $blog['title']; ?></strong><br>
        <small><?= substr($blog['description'], 0, 100);?></small>
      </td>
      <td>
        <button> <a target="blank" href="../post.php?title=<?= $blog['title']; ?>&post_id=<?= $blog['post_id']; ?>">View</a></button>
          <button><a href="add_new_post.php?post_id=<?= $blog['post_id'];?>">Edit</a></button><button><a href="process/postprocess.php?post_id=<?= $blog['post_id'];?>">Delete</a></button></td>
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