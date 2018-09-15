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

<button class="btn btn-primary" style="float: right;"><a href="add_new_post.php" style="color: black; text-decoration: none;">Add New</a>
</button>
this is deleted articles
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
       $delarts = $posts->selectCat(0, 'articles');//take data from data
       if($delarts != 0){
       foreach ($delarts as $delart) {
    ?>
      <th scope="row"></th>
      <td><img src="<?= $delart['image'];?>" style="width: 150px; height: 100px;"></td>
      <td>
        <strong><?= $delart['title']; ?></strong><br>
        <small><?= substr($delart['description'], 0, 100);?></small>
      </td>
      <td><button><a href="process/deleteprocess.php?post_id=<?= $delart['post_id'];?>">Complete Death</a></button>
        <button><a href="process/restoreprocess.php?post_id=<?= $delart['post_id'];?>">Reincarnate</a></button></td>
    </tr>
    <?php }
  }else{
    echo "No item found";
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