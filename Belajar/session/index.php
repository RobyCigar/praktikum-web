<?php
session_start();
print_r($_SESSION);
/* if disini untuk men-cek apakah ada session["username"] yang telah di set, jika belum maka akan diarahkan ke file login.php */
if(!isset($_SESSION["username"]))
{
 header("location:login.php");
}

?>

<!-- mulai darisini adalah tampilan jika sudah berhasil set session[type] -->
<html>
 <head>
  <title>Bagaimana Memanfaatkan Session Login/Logout</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Menggunakan Session Untuk Login/Logout</h2>
   <br />
   <div align="right">
    <a href="logout.php">Logout</a>
   </div>
   <br />
   <?php
   if(isset($_SESSION["username"]))
   {
    echo '<h2 align="center"> Hai '.$_SESSION['username'].',Anda berhasil men-set Session !</h2>';
   }
   ?>
  </div>
 </body>
</html>
