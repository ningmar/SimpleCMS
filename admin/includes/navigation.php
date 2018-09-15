<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand"><h4 style="font-weight: 900;">TNTN</h4></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php" style="font-weight: bold;">Dashboard<span class="sr-only">(current)</span></a></li>
        <li><a href="articles.php" style="font-weight: bold;">Articles</a></li>
        <li><a href="blogs.php" style="font-weight: bold;">Blogs</a></li>
        <li><a href="del_arti.php" style="font-weight: bold;">Deleted Articles</a></li>
        <li><a href="del_blogs.php" style="font-weight: bold;">Deleted Blogs</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-weight: bold;"><?=$_SESSION['username'];?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="" data-toggle="modal" data-target="#changepassmodal">Change Pasword</a></li>
            <li><a href="process/logoutprocess.php">logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- modal for chaging password -->

<!-- Modal -->
<div class="modal fade" id="changepassmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
        <form action="process/changepasswordprocess.php" method="post">
          <div class="form-group">
              <label for="exampleInputEmail1">Old password</label>
              <input type="password" class="form-control" name="cpassword" id="cpass" placeholder="********" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">New Password</label>
              <input type="password" class="form-control" name="newpassword" id="cpass" placeholder="********" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm Password</label>
              <input type="password" class="form-control" name="conpassword" id="cpass" placeholder="********" required>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="saveChange">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>