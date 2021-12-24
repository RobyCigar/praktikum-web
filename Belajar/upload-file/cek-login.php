<?php
session_start();
$username="ferian@hyung.oppa";
$password="password";
$type="admin";
	if($_POST["user_email"]==$username){
		if($_POST["user_password"]==$password) {
			$_SESSION['username']=$_POST['user_email'];
			header("location:index.php");
		} else {
			header("location:login.php?log=err1");
		}
	} else {
		
		header("location:login.php?log=err2");
	}

?>