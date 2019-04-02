<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PHP E-COMMERCE</title>
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body>

	<div class="login-sidenav">
		<div class="login-main-text">
		    <h2>Application<br> Registration</h2>
		    <p><a href="/login">Login</a> or register from here to access.</p>
		</div>
	</div>
	<div class="main-login-area">
		<div class="col-md-6 col-sm-12">

			<div class="session-msg mt-5">
				<?php partials('notifications'); ?>
			</div>

		    <div class="register-form">
		       <form action="/register" method="post">
		          <div class="form-group">
		             <label>Name</label>
		             <input type="text" name="name" class="form-control rounded-0" placeholder="User Name">
		             <?php if(isset($_SESSION['validate-name'])) : ?>
		             	 <small class="form-text text-danger">
		             	 	<?php echo $_SESSION['validate-name'][0]; ?>
		             	 </small>
		             <?php endif; ?>
		          </div>
		          <div class="form-group">
		             <label>Email</label>
		             <input type="email" name="email" class="form-control rounded-0" placeholder="User Email">
		             <?php if(isset($_SESSION['validate-email'])) : ?>
		             	 <small class="form-text text-danger">
		             	 	<?php echo $_SESSION['validate-email'][0]; ?>
		             	 </small>
		             <?php endif; ?>
		          </div>
		          <div class="form-group">
		             <label>Password</label>
		             <input type="password" name="password" class="form-control rounded-0" placeholder="Password">
		             <?php if(isset($_SESSION['validate-password'])) : ?>
		             	 <small class="form-text text-danger">
		             	 	<?php echo $_SESSION['validate-password'][0]; ?>
		             	 </small>
		             <?php endif; ?>
		          </div>		          
		          <button type="submit" name="register" class="btn btn-black rounded-0">Register</button>
		          <a href="/login" class="btn btn-default rounded-0"> Already registered?</a>
		       </form>
		    </div>
		</div>
	</div>
	<script src="../node_modules/jquery/dist/jquery.min.js" type="text/javascript"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>