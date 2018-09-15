<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" style="font-weight: 900;">TNTN</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="">Blogs<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="programming.php">Programming</a></li>
            <li><a href="blogs.php">Life Lession</a></li>
          </ul>
        </li>
        <li><a href="support.php">Support Us</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
      <!-- if set session -->
      <?php if(isset($_SESSION['username'])) { ?>
      <ul class="nav navbar-nav navbar-right">
        <li><span class="glyphicon glyphicon-user"></span><?= $_SESSION['username']; ?></li>
        <li><a href="" data-toggle="modal" data-target="#changepassmodal">Change password</a></li>
        <li><a href="process/logout.php">logout</a></li>
      </ul>
      <?php } else {?>
      <!-- if session not set -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Subscribe Us</a></li>
        <li><a href="" data-toggle="modal" data-target="#loginmodal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      <?php }?>
        </div>
      </div>
    </nav>
    <!-- for login -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Log in</h4>
      </div>
      <div class="modal-body">
        <form action="process/loginprocess.php" method="post">
          <div class="form-group">
              <label for="username">username</label>
              <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" placeholder="********" required>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="login">Log in</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- modal for password change -->
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
    <div style="width: 100%; height: 50px;"></div>
