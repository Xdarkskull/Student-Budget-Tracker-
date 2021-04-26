<?php

 if (isset($_POST['submit'])){
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$mailFrom = $_POST['email'];
	$message = $_POST['message'];
	
	$headers = "From: ".$mailFrom;
	$text = "You have received an email from ".$name.".\n\n".$message;
	
	
	if((empty($name)) || (empty($subject)) || (empty($mailFrom)) || (empty($message))){
	header("Location:contact_us.php?error");
	}
	else {
		$mailTo = "nauynguyenthi@yahoo.com";
		if(mail($mailTo, $subject, $text, $headers)){
		header("Location:contact_us.php?success");
		}
	}
}
	else{
		header("Location:contact_us.php");
	}

?>