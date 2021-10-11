<?php
$conn = mysqli_connect("localhost", "root", "", "praktikum");
if ($conn->connect_error) {
    echo "connection error";
}

function getMahasiswa()
{
    global $conn;
    $res;

    $query = mysqli_query($conn, "SELECT * FROM mahasiswa");


    while ($query->fetch_assoc()) {
        $res[] = $query->fetch_assoc();
    }

    return $res;
}

$result = getMahasiswa();

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
    <table border="2" cellspacing="0">
        <tr>
            <th>
                Nim
            </th>
            <th>
                Gambar
            </th>
            <th>
                Email
            </th>
            <th>
                Nama
            </th>
            <th>
                Gender
            </th>

        </tr>
        <?php foreach ($result as $mhs) : ?>
            <tr>
                <td><?= $mhs["nim"] ?></td>
                <td><img height="50" width="50" src="<?= $mhs["image"] ?>" alt=""></td>
                <td><?= $mhs["email"] ?></td>
                <td><?= $mhs["first_name"] ?></td>
                <td><?= $mhs["gender"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>