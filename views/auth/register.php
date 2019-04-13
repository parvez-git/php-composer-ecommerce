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
			<a class="py-2" href="/">
				<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mb-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
			</a>
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