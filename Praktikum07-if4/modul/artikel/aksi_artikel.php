<?php

include "../../config/db_conn.php";
include "../../config/url.php";
include "../../config/NamaGambar.php";
include "../../config/HapusGambar.php";

$act = (isset($_GET['act'])) ? $_GET['act'] : 'none';
$menu = (isset($_GET['menu'])) ? $_GET['menu'] : 'none';
if ($act == 'insert' || $act == 'update') {

    $id_artikel = $_POST['id_artikel'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $id_artikel = validate($id_artikel);
    $judul = validate($judul);
    $isi = validate($isi);

    if ($act == 'update') {$oldgambar = $_POST['oldgambar'];}
    $gambar = ($_FILES['gambar']['name']);
    
    $gambar = validate($gambar);
} else {
    $id = $_GET['id_artikel'];
    $oldgambar = $_GET['oldgambar'];
}

switch ($act) {
    case 'insert':
        // code disini
        $NamaGambar = getNamaGambar($gambar, 'artikel');
        $extension = findexts($gambar);

        if(($extension == "png") || ($extension == "jpg") || ($extension == "jpeg") || ($extension == "gif")) {
            if(move_uploaded_file($_FILES['gambar']['tmp_name'], "../../upload/artikel/" . $NamaGambar )) {
                $query = "INSERT INTO artikel (id_artikel, judul, isi, gambar) VALUES ('$id_artikel', '$judul', '$isi', '$NamaGambar')";

                // membuat thumbnail gambar
                createThumb($gambar, 'artikel', $NamaGambar);
                
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                print_r($result);

                // mengalihkan halaman kembali ke index.php
                if($result) {
                    header("location: ../../index.php?menu=artikel&alert=Artikel Berhasil Ditambahkan");
                } else {
                    echo "gagal";
                }

            } 
        }

        echo $extension;
        

        break;
    case 'update':
        // code disini
        
        
        $NamaGambar = getNamaGambar($gambar, 'artikel');
        $ext = findexts($gambar);
        
        if (($ext == "png") || ($ext == "jpg") || ($ext == "jpeg") || ($ext == "gif")) {
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], "../../upload/artikel/" . $NamaGambar)) {
                $query = "UPDATE artikel SET judul='$judul', isi='$isi', gambar='$NamaGambar' WHERE id_artikel='$id_artikel'";
     
                // membuat thumbnail gambar 
                createThumb($gambar, 'artikel', $NamaGambar);
                $sql = mysqli_query($conn, $query);
                

            } 
        } else {
            die("tipe file harus png, jpg, jpeg, gif");
        }


        if($sql) {
            header("location: ../../index.php?menu=artikel&alert=Update berhasil");
        } else {
            var_dump(mysqli_error($conn));
        }

        break;

    case 'delete':
        // code disini
        $id_artikel= $_GET['id'];

        $query = "DELETE FROM artikel WHERE id_artikel='$id_artikel'";

        $sql = mysqli_query($conn, $query);
        

        if ($sql) {
            header("location: ../../index.php?menu=artikel&alert=Hapus berhasil");
        } else {
            var_dump(mysqli_error($conn));
        }

        break;
    default:
        break;
}
?>
