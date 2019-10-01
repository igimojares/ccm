   <!--   Core JS Files   -->
  <script src="<?php echo base_url() .'public'; ?>/assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url() .'public'; ?>/assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url() .'public'; ?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url() .'public'; ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="<?php echo base_url() .'public'; ?>/assets/css/bootstrap.min.css" >
    
    <!--Fontawesome CDN-->
	  <link rel="stylesheet" href="<?php echo base_url() .'public/fontawesome/css/'; ?>all.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() .'public'; ?>/assets/css/style.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
				<form action="<?php echo base_url() . 'index.php/welcome/validate/'; ?>" method="POST" >
					<?php if($error != ''){ echo "<p style='color:red;'>". $error ."</p>"; } ?>
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" required placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password">
					</div>
					<!--<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>--><br /><br />
					<div class="form-group">
						<input type="submit" value="Login" required class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<!--<div class="card-footer">
				<div class="d-flex justify-content-center links">
				
				</div>
				<div class="d-flex justify-content-center">
					
				</div>
			</div>-->
		</div>
	</div>
</div>
</body>
</html>