<?php include('server.php'); ?>
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
	<div class="welcome">
	<h1>Welcome to Student Budget Tracker</h1>

	</div>

</body>
</html>