<?php 
     include 'includes/head.php'; 
     include 'includes/navigation.php';
     require_once 'core/database/Connection.php';
     require_once 'core/classes/posts.php';
?>
    
    <!-- main body -->

    <div class="container-fluid">
        <?php
            if(isset($_GET['error']) || isset($_GET['success'])) {
                ?>
                <div>

                    <ul class="breadcrumb">
                        <?php
                        if(isset($_GET['error']) && $_GET['error'] != '') {
                            echo base64_decode($_GET['error']);
                        }
                        if(isset($_GET['success']) && $_GET['success'] != '') {
                            echo base64_decode($_GET['success']);
                        }

                        ?>
                    </ul>
                </div>
                <?php
            }
?>
        <div class="row">
            <div class="col-md-8 col- lg-8 col-sm-12">
               <!-- the post goes here upto 3 recent articles -->
               <?php 
                 $post = new Post();
                 $posts = $post->selectHome();
                 foreach ($posts as $post) {
               ?>
               <article>
                   <h3 style="font-weight: bold;"><?= $post['title']; ?></h3>
                       <img src="<?=$post['image']; ?>" width="650px"><p><?= substr($post['description'], 0, 150) ?><a href="post.php?title=<?= $post['title']; ?>&post_id=<?= $post['post_id']; ?>">Read more>>></a>
                   </p>
                   <p>
                       by <?= $post['author'];?> on <?= $post['post_time']; }?>
                   </p>
               </article>
            </div>
            <div class="col-md-4 col-lg-4">
                <!-- the side bar that contain popular items -->
                <div style="border: 1px solid black;">
                <ul class="nav nav-tabs" >
                  <li role="presentation"><button onclick="hide();">Most Recents</button></li>
                    
                  <li role="presentation"><button onclick="show();">Most popular</button></li>
                </ul>
                <ul id="recent">
                        <li><p><strong>This is title and photo for most recent</strong></p></li>
                        <li><p><strong>This will be working</strong></p></li>
                        <li><p><strong>This is title and photo for most recent</strong></p></li>
                        <li><p><strong>This will be working</strong></p></li>
                        <li><p><strong>This is title and photo for most recent</strong></p></li>
                        <li><p><strong>This will be working</strong></p></li>
                    </ul>
                    <ul id="popular" style="display: none;">
                        <li><p><strong>This is title and photo for most popular</strong></p></li>
                        <li><p><strong>Tpopular in this site</strong></li>
                        <li><p><strong>This is title and photo for most popular</strong></p></li>
                        <li><p><strong>Tpopular in this site</strong></li>
                        <li><p><strong>This is title and photo for most popular</strong></p></li>
                        <li><p><strong>Tpopular in this site</strong></p></li>
                    </ul>
                 </div>
            </div>
        </div>
    </div>
    
    
<?php 
    include 'includes/footer.php';
?>
