<?php
// memasukkan data ke database

if (isset($_POST['submit'])) {

    function validate($data)
    {
        $data = trim($data); // " String   " -> "String"
        $data = stripslashes($data); // " \n \fsaf" -> "n fsaf"
        $data = htmlspecialchars($data); // "<a>Link</a>" -> "&lt;a&gt;Link&lt;/a&gt;"
        return $data;
    }

    // memasukkan data dari user ke dalam variabel
    $city = validate($_POST['city']);
    $street = validate($_POST['street']);
    $no_branch = validate($_POST['no_branch']);
    $post_code = validate($_POST['post_code']);

    // membangun koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "dreamhome");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // memasukkan data ke database
    $sql = "INSERT INTO branch (branchNo, street, city, postCode) VALUES ('{$no_branch}',  '{$street}' , '$city', '$post_code' )";

    $query = mysqli_query($conn, $sql);

    
    if ($query) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data gagal ditambahkan";
    }
}
