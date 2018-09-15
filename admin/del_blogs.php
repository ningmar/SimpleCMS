<?php 
session_start();
require_once '../core/database/Connection.php';
require_once '../core/classes/posts.php';
if((isset($_SESSION['uid'])) && $_SESSION['uid'] != '') {
?>
<?php

     include 'includes/head.php';
     include 'includes/navigation.php';
     // $pass = password_hash('admin', PASSWORD_DEFAULT);
     
?>
<div class="container">
<button class="btn btn-primary" style="float: right;"><a href="add_new_post.php" style="color: black; text-decoration: none;">Add New</a>
</button>
this is deleted blogs
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
       $delblogs = $posts->selectBlogs(0);//take data from data
       if ($delblogs != 0) {
         
       foreach ($delblogs as $delblog) {
    ?>
      <th scope="row"></th>
      <td><img src="<?= $delblog['image'];?>" style="width: 150px; height: 100px;"></td>
      <td>
        <strong><?= $delblog['title']; ?></strong><br>
        <small><?= substr($delblog['description'], 0, 100); ?></small>
      </td>
      <td><button><a href="process/deleteprocess.php?post_id=<?= $delblog['post_id'];?>">Complete Death</a></button>
        <button><a href="process/restoreprocess.php?post_id=<?= $delblog['post_id'];?>">Reincarnate</a></button></td>
    </tr>
    <?php }
  }else{
    echo 'No item to desplay';
  }?>
  </tbody>
</table>
</div>
<?php include 'includes/footer.php'; ?>
<?php }else{
  // echo "erorororor";
  header('location:login.php');
}
?>