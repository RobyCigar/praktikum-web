<?php


if(!empty($_POST)){

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

    if (isset($_POST['submit'])) {

        // memasukkan data ke database
        $sql = "INSERT INTO branch (branchNo, street, city, postCode) VALUES ('{$no_branch}',  '{$street}' , '$city', '$post_code' )";
    
        $query = mysqli_query($conn, $sql);
    
        
        if ($query) {
            echo "<script>alert('Data berhasil dimasukkan');location='index.php';</script>";
        } else {
            echo "<script>alert('Data tidak berhasil dimasukkan');location='form.php';</script>";
        }
    }elseif(isset($_POST['edit'])){
        $edit = "UPDATE branch SET street='$street', city='$city', postCode='$post_code' WHERE branchNo='$no_branch'";

        $query_edit = mysqli_query($conn, $edit);

        if ($query_edit) {
            echo "<script>alert('Data berhasil diupdate');location='index.php';</script>";
        } else {
            echo "<script>alert('Data tidak berhasil diupdate');</script>";
        }
    }



}elseif(!empty($_GET)){
    if($_GET['action'] === "hapus"){

        $branch_no = $_GET['branchNo'];

        $query_hapus = mysqli_query($conn, "DELETE FROM branch WHERE branchNo='$branch_no'");

        if ($query_hapus) {
            echo "<script>alert('Data berhasil dihapus');location='index.php';</script>";
        } else {
            echo "<script>alert('Data tidak berhasil dihapus');</script>";
        }
    }
}

?>