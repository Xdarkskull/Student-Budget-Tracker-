<?php
include_once('homepage.php');
include_once('delete_id.php');

$db = mysqli_connect('localhost', 'root','', 'registration') or die("Could not connect to database");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}
$id = $_POST['id'];
$dateexpense = $_POST['dateexpense'];
$expense = $_POST['expense'];
$amount = $_POST['amount'];

/*if(isset($_GET['delete_id']){
	$id=intval($_GET['delete_id']);
	$query=mysqli_query($db, "DELETE * FROM expense WHERE id = '$id'");
	if($query){
		echo '<script>alert("Your expense has been deleted".);</script>';
		echo "<script>window.location.href='expense.php'</script>";	
	} else {
		echo '<script>alert("Something went wrong. Please try again");</script>';
	}
}
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>Exenpse Tracker</title>
</head>

<body>
<div class="table_table">
<table>
<thead>
<tr>
<th>Quantity</th>
<th>Expense On</th>
<th>Expense Amount</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<?php 
$id = $_SESSION['id'];
$sql=mysqli_query($db,"SELECT * FROM expense WHERE id = '$id'");
$number=1;
while ($sql = mysqli_fetch_array($data)){
?>
<tbody>
<tr>
<td><?php echo $number; ?></td>
<td><?php echo $row['expense']; ?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['dateexpense']; ?></td>
<td><a href="delete.php?delete_id=$sql[id]<?php echo$row['id'];?>">Delte</a>
</tr>
<?php
$number=$number+1;
}
?>
</tbody>
</table>
</div>
</body>
</html>
