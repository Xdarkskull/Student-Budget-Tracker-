<!DOCTYPE html>
<html>
<head>
<title> Home Page </title>
<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
<div class = "menu_bar"> 
<ul>
<li class="theme"><a href="homepage.php">Home</a></li>
<!--<li><a href="profile.php"> My Profile</a></li> -->
<li><a href="add_expenses.php">Expenses</a></li>
<li><a href="income.php">Income</a></li>
<li><a href="loans.php">Loans</a></li>
<li><a href="contact_us.php"> Contact Us</a>
<li><a href="logout.php">Log Out</a></li>
</ul>
</div>
	<div class = "content">
	<?php if (isset($_SESSION['success'])):?>
		<div class="error success">
		<h3>
			<?php echo $_SESSION['success'];
				  unset($_SESSION['success']);
			?>
		</h3>	
		
	</div>
	<?php endif ?>
	</div>

<head>
<meta charset="UTF-8">
<meta name="port" content="device, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Contact Us</title>
<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
<main>

<div class = "header">
		<h2>CONTACT US</h2> 
	</div>
<form class="contact_us" action="contact_email.php" method="POST">
<?php
		$message = "";
		if(isset($_GET['error'])){
			$message="Please Fill in the Blanks";
			echo '<div class ="error">'.$message.'</div>';
		}
		if(isset($_GET['success'])){
			$message="Your Message Has Been Successfully Sent";
			echo '<div class ="error">'.$message.'</div>';
		}
		?>
<div class="input-input">
	<input type="text" name="name" placeholder="Your Full Name">
</div>
<div class="input-input">
	<input type="text" name="email" placeholder="Your Email">
</div>
<div class="input-input">
	<input type="text" name="subject" placeholder="Subject">
</div>
<div class="input-input">
	<textarea name="message" placeholder="Your message is here" rows= "10" cols="30"></textarea>
</div>
	<button type="submit" name="submit" class="btn">SEND</button>
</form>
</main>
</body>
</html>
