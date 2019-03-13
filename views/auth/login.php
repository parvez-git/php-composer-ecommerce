<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PHP E-COMMERCE</title>
	<link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body>

	<div class="login-sidenav">
		<div class="login-main-text">
		    <h2>Application<br> Login</h2>
		    <p>Login or <a href="/register">Register</a> from here to access.</p>
		</div>
	</div>
	<div class="main-login-area">
		<div class="col-md-6 col-sm-12">

			<div class="session-msg mt-5">

				<!-- SUCCESS MESSAGE -->
				<?php if(isset($_SESSION['success'])) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  	<span><?php echo $_SESSION['success']; ?></span>
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				<?php endif; ?>	

				<?php if(isset($_SESSION['mailsend'])) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  	<span><?php echo $_SESSION['mailsend']; ?></span>
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				<?php endif; ?>

				<!-- ERROR MESSAGE -->
				<?php if(isset($_SESSION['error'])) : ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  	<span><?php echo $_SESSION['error']; ?></span>
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				<?php endif; ?>

			</div>

		    <div class="login-form">
		       <form action="/login" method="post">
		          <div class="form-group">
		             <label>User Email</label>
		             <input type="email" name="email" class="form-control rounded-0" placeholder="User Email">
		             <?php if(isset($_SESSION['login-email-error'])) : ?>
		             	 <small class="form-text text-danger">
		             	 	<?php echo $_SESSION['login-email-error'][0]; ?>
		             	 </small>
		             <?php endif; ?>
		          </div>
		          <div class="form-group">
		             <label>Password</label>
		             <input type="password" name="password" class="form-control rounded-0" placeholder="Password">
		             <?php if(isset($_SESSION['login-password-error'])) : ?>
		             	 <small class="form-text text-danger">
		             	 	<?php echo $_SESSION['login-password-error'][0]; ?>
		             	 </small>
		             <?php endif; ?>
		          </div>
		          <button type="submit" class="btn btn-black rounded-0">Login</button>
		          <a href="/register" class="btn btn-default">Not member yet?</a>
		       </form>
		    </div>
		</div>
	</div>
	<script src="../node_modules/jquery/dist/jquery.min.js" type="text/javascript"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>