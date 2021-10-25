<?php
session_start();
if(isset($_SESSION["username"]))
{
 header("location:index.php");
}
$message='';
if (isset($_GET['log'])) {
    if ($_GET['log']=="err1") {
        $message = '<div class="alert alert-danger">salah imel</div>';
    }
    $message = "<div class='alert alert-danger'>salah passwet</div>";
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Login Logout Pake Session</title>
  <script language="javascript">
            function validasi(form){
                if (form.user_email.value == ""){
                    alert("Anda belum mengisikan Username.");
                    form.user_email.focus();
                    return (false);
                }
     
                if (form.user_password.value == ""){
                    alert("Anda belum mengisikan Password.");
                    form.user_password.focus();
                    return (false);
                }
                return (true);
            }
        </script>
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
     <form method="post" action="cek-login.php" onSubmit="return validasi(this)">
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
