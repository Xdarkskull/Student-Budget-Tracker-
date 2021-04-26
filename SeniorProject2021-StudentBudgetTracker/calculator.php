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