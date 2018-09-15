<?php
require_once 'process/indexProcess.php';
// session_start();
if (isset($_SESSION['uid'])) {
include 'includes/head.php';
include 'includes/navigation.php';
?>
<div class="container">

	<button class="btn btn-primary" style="float: right;"><a href="add_new_post.php" style="color: black; text-decoration: none;">Add New</a>
    </button>
<div class="row">

  <div class="col-lg-8 col-md-8">
  	
    <?php
            if(isset($_GET['error']) || isset($_GET['success'])) {
                ?>
                <div>

                    <ul class="breadcrumb">
                        <?php
                        if(isset($_GET['error']) && $_GET['error'] != '') {
                            echo "<h3>".base64_decode($_GET['error'])."</h3>";
                        }
                        if(isset($_GET['success']) && $_GET['success'] != '') {
                            echo "<h3>".base64_decode($_GET['success'])."</h3>";
                        }

                        ?>
                    </ul>
                </div>
                <?php
            }
    ?>
    <h4>Comments</h4>
    <div class="jumbotron">
    <div class="alert alert-success" role="alert">
      someone comment on your this blog
    </div>
    </div>
    <h4>Notifications</h4>
    <div class="jumbotron">
        <div class="alert alert-info" role="alert">
          Someone donated you something
        </div>
        </div>
        <h4>FeedBacks</h4>
        <div class="jumbotron">
        <div class="alert alert-warning" role="alert">You suck in web development and you know it</div>
      </div>
  </div>
  <!--  pageviews and all the good stuff tables and statisics-->
  <div class="col-lg-4 col-md-4">
    <h4>Statistics</h4>
    <p>Total pageviews: <?php echo "$pageview";?></p>
    <!-- load table showing statistics -->
    <div class="jumbotron">
      <table class="table table-inverse">
                 <thead>
                    <tr>
                       <th>#</th>
                       <th>Duration</th>
                       <th>pageviews</th>
                       <th>Source</th>
                    </tr>
                 </thead>
          <tbody>
            <tr>
              <th>1</th>
              <td>Today</td>
              <td>00</td>
              <td>N/A</td>
            </tr>
            <tr>
              <th>2</th>
              <td>Yesterday</td>
              <td>00</td>
              <td>N/A</td>
            </tr>
            <tr>
              <th>3</th>
              <td>Last Month</td>
              <td>00</td>
              <td>N/A</td>
            </tr>
        </tbody>
        <tfoot>
          <th></th>
          <th>Total</th>
          <th>000</th>
          <th>N/A</th>
        </tfoot>
      </table>
    </div>
    <div id="down">
      <h4>Subscribers</h4>
      <div class="jumbotron" style="height: 450px; overflow: scroll;">
        <?php
           foreach ($subscribers as $subscriber) { ?>
            <p style="height: auto; width: 100%;"><?php echo $subscriber['username'];?> has just subscribed for your news article.</p><hr>
      <?php     }
        ?>
        </div>
    </div>
  </div>
</div>
<?php
include 'includes/footer.php';
}else{
	header('location:login.php');
}
?>