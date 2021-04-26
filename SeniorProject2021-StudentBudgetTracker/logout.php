<?php
//logout the system
session_start();
session_destroy();
unset($_SESSION['username']);
$_SESSION['message'] = "Thank you. You have sucessfullly logged out.";
header("location:login.php");
?>
