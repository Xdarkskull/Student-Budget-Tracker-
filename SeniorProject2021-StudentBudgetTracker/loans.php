<?php
session_start();
//include_once('homepage.php');
include_once('server.php');
$db = mysqli_connect('localhost', 'root','', 'registration') or die("Could not connect to database");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}
	//insert into the database
	if(isset($_POST['hit'])){
		$dateexpense = $_POST['dateloans'];
		$expense = $_POST['title'];
		$amount = $_POST['amount'];
		$sql = "INSERT INTO expense (dateloans, title, amount) 
                    VALUES ('$dateloans','$title','$amount')";
		
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
		$sql="DELETE FROM loans WHERE id=$id";
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
	<title>Add Loans</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>
	<div class = "header1">
		<h2>Add Loans</h2>
	</div>
	<table>
	<form action="loans.php?hit" method="POST">
		<div class="input-input1">
			<label>Date of Loans</label>
			<input  type="date" name="dateloans">
		</div>
		<div class="input-input1">
			<label>Title</label>
			<input  type="text" name="title">              
		</div>
		<div class="input-input1">
			<label>Amount of Loans ($)</label>
			<input  type="text" name="amount">
		</div>
		<div class="input-input1">
			<button type="submit" name="hit" class="btn">Add<a href="loans.php"></a></button>
		</div>
	</form>
	</table>
	
	<table>
<head>
<title>Loans Calculator</title>
</head>
<style>table{font-size: 15px;} input{font-size:15px;}
</style>
<?php
$amount="";
$cal=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$amount=$_POST["text1"];
	$rate=$_POST["text2"];
	$rate=$rate/100;
	$month=$_POST["text3"];
	
	
	$cal=$amount * $rate * (pow((1+$rate),$month)/(pow((1+$rate),$month)-1));
	$cal=round($cal,2);
	//print $cal;
}
?>
<body>
<form name="cal" method="POST" action="">
<table align=center width=20%>
<tr><td colspan=2 align=center> Loans Calculator</td></tr><br>
<tr><td>Loan Amount($)</td><td><input type="text" name="text1" id="text1" value=""></tr><br>
<tr><td>Interest Rate(%)</td><td><input type="text" name="text2" id="text2" value=""></tr><br>
<tr><td>Period of Months</td><td><input type="text" name="text3" id="text3" value=""></tr><br>
<tr><td></td>
	<td><input type="submit" name="Calculate" value="Calculate"></tr>
</table>
</form>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
	print("<table align=center width=20%>");
	print("<tr><td width=40%>Loan Amount($)</td><td width=60%>".$amount."</td></tr>");
	print("<tr><td width=40%>Interest Rate(%)</td><td width=60%>".$rate."</td></tr>");
	print("<tr><td width=40%>Period of Months</td><td width=60%>".$month."</td></tr>");
	print("<tr><td width=40%>Calculation</td><td width=60%>".$cal."</td></tr>");
	print("<tr><td width=40%>Total Amount($)</td><td width=60%>".$cal * $month."</td></tr>");
	print("<tr><td width=40%>Total of Interest</td><td width=60%>".($cal * $month)-$amount."</td></tr>");
}
?>

</body>
</table>
	
<?php
//connect to the database
$connect = new mysqli("localhost","root","","registration");
$sql = "SELECT 
		month(dateloans) as month,
		year(dateloans) as year,
		sum(amount) as total
		FROM loans
		GROUP BY month(dateloans), year(dateloans) ORDER BY year DESC";
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
	
	
	<body>
		<center>
		<table class="table_table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Amount($)</th>
                  <th>Action</th>
                </tr>
              </thead>
		<?php 
		$sql="SELECT * FROM `loans` ORDER BY dateloans DESC";
		$result=mysqli_query($db,$sql);
		while ($row = mysqli_fetch_assoc($result)){
		?>
	<tbody>
				<tr>
					<td><?php echo $row['dateloans']; ?></td>
					<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['amount']; ?></td>
				<td><a href="loans.php?delete=<?php echo$row['id'];?>">Delete</a><td>
				</tr>
		<?php 
		}
		?>
	
	</tbody>
</table>
</body>
</html>