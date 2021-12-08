<?php
// memasukkan data ke database
include "./db_conn.php";
session_start();

if ($_SESSION['role'] == "user" || !isset($_SESSION['username'])) {
    header("location:./login/login.php");
}

function validate($data)
{
$data = trim($data); // " String " -> "String"
$data = stripslashes($data); // " \n \fsaf" -> "n fsaf"
$data = htmlspecialchars($data); // "<a>Link</a>" -> "&lt;a&gt;Link&lt;/a&gt;"
return $data;
}

if (!empty($_POST)) {
// memasukkan data dari user ke dalam variabel
$city = validate($_POST['city']);
$street = validate($_POST['street']);
$no_branch = validate($_POST['no_branch']);
$post_code = validate($_POST['post_code']);


if (isset($_POST['submit'])) {

// memasukkan data ke database
$sql = "INSERT INTO branch (branchNo, street, city, postCode) VALUES ('{$no_branch}', '{$street}' , '$city', '$post_code' )";

$query = mysqli_query($conn, $sql);


if ($query) {
echo "<script>
    alert('Data Berhasil Ditambahkan');
    location = 'index.php';
</script>";
} else {
echo "<script>
    alert('Error');
    window.history.go(-1);
</script>";
}
} elseif (isset($_POST['edit'])) {
$edit = "UPDATE branch SET street='$street', city='$city', postCode='$post_code' WHERE branchNo='$no_branch'";
$query_edit = mysqli_query($conn, $edit) or die(mysqli_error($conn));

if ($query_edit) {
echo "<script>
    alert('Data Berhasil Diubah');
    location = 'index.php';
</script>";
} else {
echo "<script>
    alert('Error');
    window.history.go(-1);
</script>";
}
}
} else if (!empty($_GET)) {

if ($_GET["action"] === "hapus") {

// menangkap data id yang di kirim dari url
$branch_no = $_GET['branchNo'];


// menghapus data dari database
mysqli_query($conn, "delete from branch where branchNo='$branch_no'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");
}
}