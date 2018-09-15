<?php 
     include 'includes/head.php'; 
     include 'includes/navigation.php';
?>
<h1 style="text-align: center;">Sign up</h1>
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
<div class="container">
<form method="post" action="process/signupprocess.php">
  <div class="form-group">
    <label for="Email1">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Email@email.com" required>
  </div>
  <div class="form-group">
    <label for="Username">Username</label>
    <input type="text" class="form-control" name="username" placeholder="anyusername" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="conpassword" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-default" name="submit">Sign up for free</button>
</form>
</div>
<?php 
     include 'includes/footer.php'; ?>