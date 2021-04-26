<?php
session_start();
include_once('server.php');
$db = mysqli_connect('localhost', 'root','', 'registration') or die("Could not connect to database");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}
	//insert into the database
	if(isset($_POST['add'])){
		$dateexpense = $_POST['dateexpense'];
		$expense = $_POST['expense'];
		$amount = $_POST['amount'];
		$sql = "INSERT INTO expense (dateexpense, expense, amount) 
                    VALUES ('$dateexpense','$expense','$amount')";
		
		mysqli_query($db, $sql);
	
	if($sql){
		echo '<script type="text/javascript"> alert("Expense has been added");</script>';
		} 
	
	else {
		echo '<script type="text/javascript"> alert("Something went wrong. Please try again");</script>';
	       }
	}
	
	//delete the record 
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$sql="DELETE FROM expense WHERE id=$id";
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
	<title>Add Expenses</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>
	<div class = "header1">
		<h2>Add Expenses</h2>
	</div>
	<table>
	<form action="add_expenses.php?add" method="POST">
		<div class="input-input1">
			<label>Date of Expense</label>
			<input  type="date" name="dateexpense">
		</div>
		<div class="input-input1">
			<label>Item</label>
			<input  type="text" name="expense">
		</div>
		<div class="input-input1">
			<label>Amount of Item ($)</label>
			<input  type="text" name="amount">
		</div>
		<div class="input-input1">
			<button type="submit" name="add" class="btn">Add<a href="add_expenses.php"></a></button>
		</div>
	</form>
	</table>
	
	<div class = "header2">
	<h2>Total</h2>
	</div>
<?php
//connect to the database
$connect = new mysqli("localhost","root","","registration");
$sql = "SELECT 
		month(dateexpense) as month,
		year(dateexpense) as year,
		sum(amount) as total
		FROM expense
		GROUP BY month(dateexpense), year(dateexpense) ORDER BY year DESC";
$result = $connect->query($sql);

?>
<!-- Add on the total by months -->
	<table class="table_table1">
	<body>
	<thead>
<tr>
<th>Month</th>
<th>Year</th>
<th>Total</th>
</tr>
</thead>
<?php while($row = $result->fetch_object()): ?>
<tbody>
<tr>
<th><?php echo $row->month; ?></th>
<th><?php echo $row->year; ?></th>
<th><?php echo $row->total; ?></th>
</tr>
</tbody>
<?php endwhile; ?>
  </body>
	</table>

	
	<!-- Show the list of the expenses -->
	<body>
		<center>
		<table class="table_table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Items</th>
                  <th>Amount($)</th>
                  <th>Action</th>
                </tr>
              </thead>
		<?php 
		//connect to the database
		$sql="SELECT * FROM `expense` ORDER BY dateexpense DESC";
		$result=mysqli_query($db,$sql);
		while ($row = mysqli_fetch_assoc($result)){
		?>
	<tbody>
				<tr>
					<td><?php echo $row['dateexpense']; ?></td>
					<td><?php echo $row['expense']; ?></td>
				<td><?php echo $row['amount']; ?></td>
				<td><a href="add_expenses.php?delete=<?php echo$row['id'];?>">Delete</a><td>
				</tr>
		<?php 
		}
		?>
	</tbody>
</table>
</body>
</html>