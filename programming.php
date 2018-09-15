<?php 
     include 'includes/head.php'; 
     include 'includes/navigation.php';
     require_once 'core/database/Connection.php';
     require_once 'core/classes/posts.php';
?>
    
    <!-- main body -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
               <!-- the post goes here upto 3 recent articles -->
               <?php 
                 $post = new Post();
                 $posts = $post->selectCat(1,'blog_programming');
                 foreach ($posts as $post) {
               ?>
               <article>
                   <h3 style="font-weight: bold;"><?= $post['title']; ?></h3>
                       <img src="<?=$post['image']; ?>" width="650px"><p><?= substr($post['description'], 0, 150) ?><a href="p/post.php?title=<?= $post['title']; ?>"> Read more>>></a>
                   </p>
                   <p>
                       by <?= $post['author'];?> on <?= $post['post_time']; }?>
                   </p>
               </article>
            </div>
            
        </div>
    </div>
    
    
<?php 
    include 'includes/footer.php';
?>
