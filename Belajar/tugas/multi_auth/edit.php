<?php
session_start();

if ($_SESSION['role'] == "user" || !isset($_SESSION['username']) ) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>

    <?php
    include "./db_conn.php";

    $no_branch = $_GET['branchNo'];
    $query = mysqli_query($conn, "SELECT * FROM branch WHERE branchNo='$no_branch'");

    while ($data = mysqli_fetch_array($query)) {
    ?>
        <form action="proses.php" method="post">
            <label for="nama">No branch</label><br>
            <input type="text" name="no_branch" value="<?= $data['branchNo'] ?>" readonly>
            <br>
            <label for="nama">Street</label><br>
            <input type="text" name="street" value="<?= $data['street'] ?>">
            <br>
            <label for="nama">City</label><br>
            <input type="text" name="city" value="<?= $data['city'] ?>">
            <br>
            <label for="nama">Post Code</label><br>
            <input type="text" name="post_code" value="<?= $data['postCode'] ?>">
            <br><br>
            <button type="submit" name="edit">Edit</button>
        </form>
    <?php
    }
    ?>
    <br>
    <a href="index.php"><button>[-] KEMBALI KE DATA</button></a>
</body>

</html>