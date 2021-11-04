<?php

print_r($_POST);

if (isset($_POST['submit'])) {
    $no_rumah = $_POST['no_rumah'];
    $jalan = $_POST['jalan'];
    $kota = $_POST['kota'];
    $kode_pos = $_POST['kode_pos'];


    $conn = mysqli_connect('localhost', 'root', '', 'praktikum');


    $sql = "INSERT INTO alamat (no_rumah, jalan, kota, kode_pos) VALUES ('$no_rumah', '$jalan', '$kota', '$kode_pos')";


    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
