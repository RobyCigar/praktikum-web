<?php
$conn = mysqli_connect("localhost", "root", "", "praktikum");
if ($conn->connect_error) {
    echo "connection error";
}

if(isset($_POST["add"])) {
    return exit;
}

function addMahasiswa(data)
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
    
</body>
</html>