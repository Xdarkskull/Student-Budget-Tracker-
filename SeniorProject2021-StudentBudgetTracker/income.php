<?php
session_start();
//include_once('homepage.php');
include_once('server.php');
$db = mysqli_connect('localhost', 'root','', 'registration') or die("Could not connect to database");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

	//insert into the database
	if(isset($_POST['add'])){
		$date = $_POST['date'];
		$income_type = $_POST['income_type'];
		$amount = $_POST['amount'];
		$sql = "INSERT INTO income (date, income_type, amount) 
                    VALUES ('$date','$income_type','$amount')";
		
		
		mysqli_query($db, $sql);
	
	if($sql){
		echo '<script type="text/javascript"> alert("Income has been added");</script>';
		} 
	
	else {
		echo '<script type="text/javascript"> alert("Something went wrong. Please try again");</script>';
	       }
	}
	
	//delete the record 
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$sql="DELETE FROM income WHERE id=$id";
		mysqli_query($db,$sql);
	}

	?>


<!DOCTYPE html>
<html>
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
</body>
<head>
	<title>Add Income</title>
	<link rel="stylesheet" type="text/css" href="themes.css">
</head>
	<div class = "header1">
		<h2>Add Income</h2>
	</div>
	

	<table>
	<form action="income.php" method="POST">
		<div class="input-input1">
			<label>Date of Income</label>
			<input  type="date" name="date">
		</div>
		<div class="input-input1">
			<label>Type</label>
			<input  type="text" name="income_type">
		</div>
		<div class="input-input1">
			<label>Income Amount($)</label>
			<input  type="decimal" name="amount">
		</div>
		<div class="input-input1">
			<button type="submit" name="add" class="btn">Add<a href="add_income.php"></a></button>
		</div>
	</form>
	</table>
	
	<body>
		<center>
		<table class="table_table">
              <thead>
                <tr>
                 
                  <th>Date</th>
                  <th>Income Type</th>
                  <th>Amount($)</th>
                  <th>Action</th>
                </tr>
              </thead>
		<?php 
		$sql="SELECT * FROM `income` ORDER BY date DESC";
		$result=mysqli_query($db,$sql);
		while ($row = mysqli_fetch_assoc($result)){
		?>
	<tbody>
				<tr>
					<td><?php echo $row['date']; ?></td>
					<td><?php echo $row['income_type']; ?></td>
				<td><?php echo $row['amount']; ?></td>
				<td><a href="income.php?delete=<?php echo$row['id'];?>">Delete</a><td>
				</tr>
		<?php 
		}
		?>
	
	</tbody>
</table>
</body>
</html>