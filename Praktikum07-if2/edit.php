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

        $conn = mysqli_connect("localhost", "root", "", "dreamhome");
        $no_branch = $_GET['branchNo'];
        $query = mysqli_query($conn, "SELECT * FROM branch WHERE branchNo='$no_branch'");


        while($data = mysqli_fetch_assoc($query)){
    ?>

    <form action="proses.php" method="post">
        <label for="nama">No branch</label><br>
        <input type="text" name="no_branch" id="nama" value="<?= $data['branchNo'] ?>" readonly>
        <br>
        <label for="nama">Street</label><br>
        <input type="text" name="street" id="nama" value="<?= $data['street'] ?>">
        <br>
        <label for="nama">City</label><br>
        <input type="text" name="city" id="nama" value="<?= $data['city'] ?>">
        <br>
        <label for="nama">Post Code</label><br>
        <input type="text" name="post_code" id="nama" value="<?= $data['postCode'] ?>">
        <br>
        <button type="submit" name="edit">Edit</button>
    </form>

    <?php
    }
    ?>

</body>
</html>