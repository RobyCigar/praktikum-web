<?php
/* if disini untuk men-cek apakah ada Cookie["type"] yang telah di set, jika belum maka akan diarahkan ke file login.php */
if(!isset($_COOKIE["type"]))
{
 header("location:login.php");
}

?>

<!-- mulai darisini adalah tampilan jika sudah berhasil set cookie[type] -->
<html>
 <head>
  <title>Bagaimana Memanfaatkan Cookies Login/Logout</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Menggunakan Cookies Untuk Login/Logout</h2>
   <br />
   <div align="right">
    <a href="logout.php">Logout</a>
   </div>
   <br />
   <?php
   if(isset($_COOKIE["type"]))
   {
    echo '<h2 align="center">Anda berhasil men-set Cookie !</h2>';
   }
   ?>
  </div>
 </body>
</html>
