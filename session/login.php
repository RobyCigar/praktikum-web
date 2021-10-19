<?php
//login.php
if(isset($_SESSION["username"]))
{
 header("location:index.php");
}
$message = '';
if(isset($_POST["login"]))
{
 if(empty($_POST["user_email"]) || empty($_POST["user_password"])) {
	$message = "<div class='alert alert-danger'>Harus diisi semua</div>";
 } else {
	$username="ferian@hyung.oppa";
	$password="password";
	$type="admin";
	if($_POST["user_email"]==$username){
		if($_POST["user_password"]==$password) {
			
			$_SESSION['username']=$_POST['user_email'];
			echo $_SESSION['username'];
			header("location:index.php");
		} else {
			$message = '<div class="alert alert-danger">salah paswet</div>';
		}
	} else {
		$message = "<div class='alert alert-danger'>salah imel</div>";
	}
 }
}
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Login Logout Pake Session</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">PHP Session</h2>
   <br />
   <div class="panel panel-default">

    <div class="panel-heading">Login</div>
    <div class="panel-body">
     <span><?php echo $message; ?></span>
     <form method="post">
      <div class="form-group">
       <label>Imel</label>
       <input type="text" name="user_email" id="user_email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Paswet</label>
       <input type="password" name="user_password" id="user_password" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
      </div>
     </form>
    </div>
   </div>
   <br />
   <p>Imel atmin  : ferian@hyung.oppa</p>
   <p>Paswet : password</p>
  </div>
 </body>
</html>
