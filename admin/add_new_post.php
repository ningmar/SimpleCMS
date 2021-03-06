<?php 
session_start();
require_once '../core/database/Connection.php';
if((isset($_SESSION['uid'])) && $_SESSION['uid'] != '') {


     include 'includes/head.php';
     include 'includes/navigation.php';

?>
<?php
   if (isset($_GET['post_id']) && $_GET['post_id'] != '') {
   //   //change everything to
    
    $post_id = $_GET['post_id'];
    $con = Connection::makeConnection();
   //  //sql to grab all the values
    $sql = "SELECT * FROM posts WHERE post_id = '$post_id'";
   //  //execute sql
    $post = mysqli_query($con, $sql) or trigger_error(mysqli_error($con));
    foreach ($post as $epost) {
      $title = $epost['title'];
      $description = $epost['description'];
      $image = $epost['image'];
      $category = $epost['category'];
    }
   }
?>
<div class="container">
<div class="row" style="margin-left: 10px;">
  <div class="col-lg-10 col-md-10">
      <form action="process/postprocess.php<?=((isset($_GET['post_id']))?'?edit='.$post_id:'');?>" method="post" enctype="multipart/form-data">
        <?php
            if(isset($_GET['error'])) {
                ?>
                <div>

                    <ul class="breadcrumb">
                        <?php
                        if(isset($_GET['error']) && $_GET['error'] != '') {
                            echo base64_decode($_GET['error']);
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
            ?>
        <h3>Create New Post</h3>
        <div class="form-group">
          <label for="title">Title</label>
          <textarea name="title" class="form-control" id="postTitle" required><?= ((isset($_GET['post_id']) && $_GET['post_id'] != '')
            ? $title: '');?></textarea>
          <small id="titleHelp" class="form-text text-muted">Try to use short and effective title</small>
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea name="content" class="form-control" id="postContent" rows="6" required><?= ((isset($_GET['post_id']) && $_GET['post_id'] != '')
            ? $description: '');?></textarea>
        </div>
        <div class="form-group">
          <label for="imageInputFile">Input Image if needed</label>
          <input type="file" name="image" class="form-control-file" id="postImage" aria-describedby="fileHelp">
          <?= ((isset($_GET['post_id']) && $_GET['post_id'] != '')
            ? "<img src='$image'>": '');?>
        </div>
        <div class="form-group">
          <label for="select">Select Category</label>
          <select class="form-control" id="postCategory" style="width: 25%;" name="category">
            <option value="articles">Articles</option>
            <option value="blog_programming">Blogs Related to programming</option>
            <option value="blog_lifelession">Life Lession Blogs</option>
          </select>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" name="check" class="form-check-input">
          Send to your subscribers
          </label>
        <small id="guideline" class="form-text text-muted">Send only important articles</small>
        </div>
        <button type="submit" class="btn btn-primary" name="<?= ((isset($_GET['post_id']) && $_GET['post_id'] != '')? $_GET['post_id'] : "submit");?>"><?= ((isset($_GET['post_id']) && $_GET['post_id'] != '')? "Edit": 'Post');?></button>
        <button type="button" class="btn btn-danger"><a href="index.php">Cancel</a></button>
      </form>
    </div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
<?php }else{
  // echo "erorororor";
  header('location:login.php');
}
?>