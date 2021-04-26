<?php
$username = '';
$email ='';
$password = '';
$errors = array();

// connect to the database
	$db = mysqli_connect('localhost', 'root','', 'registration') or die("Could not connect to database");	
//if the register button is clicked
	if(isset($_POST['register'])){
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']?: '');

	//if the field is not filled
	if (empty($username)) {
		array_push($errors, "Username is required.");//add the error to error array
	}
	if (empty($email)) {
		array_push($errors, "Email is required.");//add the error to error array
	}
	if (empty($password)) {
		array_push($errors, "The password is required.");//add the error to error array
	}
	//save the user into database if there are no errors happen
	if (count($errors) == 0){
		$password = md5($password); //encrypt password before storing (this is for security)
		$sql = "INSERT INTO user (username, email, password)
				VALUES ('$username','$email', '$password')";
		mysqli_query($db, $sql);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
	
		header('location: homepage.php');
	}
}
	//check database for existing users with same username
/*	$user_check = " SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";
	
	$result = mysqli_query($db, $user_check);
	$user = mysqli_fetch_assoc($result);
	if($user){
		if($user['username'] === $username){array_push($errors, "Username has been taken");}
		if($user['email'] === $email){array_push($errors, "Email has been taken");}
	}
*/	
//log user in from the login page
if(isset($_POST['login'])){
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	//if the field is not filled
	if (empty($username)) {
		array_push($errors, "Username is required.");//add the error to error array
	}
	if (empty($password)) {
		array_push($errors, "The password is required.");//add the error to error array
	}
	//save the user into database if there are no errors happen
	if (count($errors) == 0){
		$password = md5($password); //encrypt password before storing (this is for security)
		$query = "SELECT*FROM user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) == 1){
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: homepage.php');
		} else{
			array_push($errors, "Invalid username or password");
		}
	}
}	

?>

