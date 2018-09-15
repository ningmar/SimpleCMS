<?php
   include 'includes/head.php';
?>
<body style="background-color: #ff0;">
<div class="container">
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
	<div class="row jumbotron" style="margin: 10% 10% 10% 10%; padding: 10% 10% 10% 10%">

		<div class="col-md-4 col-lg-4 col-sm-4 col-md-offset-4 text-center">
			    
				<form action="process/loginprocess.php" method="post">
					<h2 style=" text-align: center;">Admin Log in</h2>
					<div class="form-group">
						<input type="text" name="username" id="name" class="form-control" placeholder="Username" required><br>
					</div>
					<div class="form-group">
						<input type="password" name="password" id="paw" class="form-control" placeholder="Password" required><br>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="form-control bg-inverse" value="Log in">
					</div>
				</form>
			
		</div>
	</div>
</div>
</body>