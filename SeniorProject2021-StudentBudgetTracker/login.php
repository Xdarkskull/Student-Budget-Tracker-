<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
	<div class = "header">
		<h2>Login</h2>
	</div>
	
	<form method="POST" action="login.php">
	<!--display errors-->
	<?php include('errors.php'); ?>
		<div class="input-input">
			<label>Username</label>
			<input  type="text" name="username">
		</div>
		<div class="input-input">
			<label>Password</label>
			<input  type="password" name="password">
		</div>
		<div class="input-input">
			<button type="submit" name="login" class="btn">Log in<a href="homepage.php"></a></button>
		</div>
		<p> 
			Not a member yet? <a href = "registration.php">Sign up</a>
		</p>
	</form>
	
</body>
</html>
			