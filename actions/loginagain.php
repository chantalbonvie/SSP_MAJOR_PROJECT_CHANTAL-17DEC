
<?php

require_once($_SERVER["DOCUMENT_ROOT"]. "/conn.php");



	session_start();
	include('conn.php');
 
	$username=$_POST['username'];
	$password=$_POST['password'];
 
	$query=mysqli_query($conn,"select * from `users` where username='$email' and password='$password'");
 
	if (mysqli_num_rows($query)<1){
		$_SESSION['message']="Login Error. Please Try Again";
		header('location:index.php');
	}
	else{
		$row=mysqli_fetch_array($query);
		$_SESSION['userid']=$row['userid'];
		header('location:home.php');
	}
 
?>