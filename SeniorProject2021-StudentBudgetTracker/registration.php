<?php include('server.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
	<div class = "header">
		<h2>Registration</h2>
	</div>
	
	<form method="POST" action="registration.php">
	<!-- display errors -->
	<?php include('errors.php'); ?>
		<div class="input-input">
			<label>Username</label>
			<input  type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-input">
			<label>Email</label>
			<input  type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-input">
			<label>Password</label>
			<input  type="password" name="password">
		</div>
		<div class="input-input">
			<button type="submit" name="register" class="btn">Submit</button>
		</div>
		<p> 
			Alredy a member? <a href = "login.php">Log in</a>
		</p>
	</form>
	
</body>
</html>
			