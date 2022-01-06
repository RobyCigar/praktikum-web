<?php



//login

session_start();

// if(!isset($_SESSION['username'])){
//     echo "<script>alert('Anda harus login dulu untuk entry data!');location='./login/login.php';</script>";
//     //header("location:./login/login.php");
// }


//end login

// mengkoneksikan php dengna mysql
// membuat query
// menampilkan


$conn = mysqli_connect("localhost", "root", "", "dreamhome");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM branch ORDER BY branchNo") or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($result)) {
    $rows[] = $data;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <span class="navbar-text mr-3">
      <?php
          if (isset($_SESSION['username'])) {
          echo "Halo admin ".$_SESSION['username'];
          }
      ?>
    </span>

    <table border="1">
        <tr>
            <th>No Branch</th>
            <th>Street</th>
            <th>City</th>
            <th>Post Code</th>
            <th>Action</th>
        </tr>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $row['branchNo'] ?></td>
                <td><?= $row['street'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['postCode'] ?></td>
                <td>
                    <a href="edit.php?branchNo=<?= $row['branchNo']?>">EDIT</a>
                    <a href="proses.php?action=hapus&branchNo=<?= $row['branchNo'] ?>" onclick="return confirm('Yakin mau hapus data ini?')">HAPUS</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <a href="form.php">[+]Tambah Data</a>
    <br>
    <br>
    <a href="./login/logout.php">LOGOUT!!</a>
    
</body>

</html>