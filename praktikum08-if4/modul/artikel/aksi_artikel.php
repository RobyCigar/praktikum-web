<?php

include "../../config/db_conn.php";
include "../../config/url.php";
include "../../config/NamaGambar.php";
include "../../config/hapusGambar.php";

$act = (isset($_GET['act'])) ? $_GET['act']:"none";

$menu = (isset($_GET['menu'])) ? $_GET['menu']:"none";

if($act == "insert" || $act=="update"){
    $id_artikel = $_POST['id_artikel'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    if($act == 'update') {$oldgambar = $_POST['oldgambar'];}
    $gambar = ($_FILES['gambar']['name']);


}else{
    $id = $_GET['id_artikel'];
    $oldgambar = $_GET['oldgambar'];
}

switch ($act){
    case 'insert':
        $extension = findexts($gambar);
        $NamaGambar = getNamaGambar($gambar, 'artikel');

        if(($extension == "bmp") || ($extension == "gif") || ($extension == "jpeg") || ($extension == "jpg")){
            if(move_uploaded_file($_FILES['gambar']['tmp_name'], '../../upload/artikel/' . $NamaGambar)){
                createThumb($gambar, 'artikel', $NamaGambar);
        $query = "INSERT INTO artikel(id_artikel,judul, isi, gambar) VALUES ('$id_artikel', '$judul', '$isi', '$NamaGambar')";
        $sql = mysqli_query($conn, $query);
        if($sql){
            url("artikel&con=0");
        }else{
            url("artikel&con=1");
        }
            }else{
                echo $query;
                url("artikel&con=9");
            }
        }
        break;

        case 'update':
            $extension = findexts($gambar);
            $NamaGambar = getNamaGambar($gambar, 'artikel');
            if (($extension == "bmp") || ($extension == "gif") || ($extension == "jpg") || ($extension == "jpeg") || ($extension == "png") || ($extension == "pdf") || ($extension == "pNamaGambar")) {
                if (move_uploaded_file($_FILES['gambar']['tmp_name'], "../../upload/artikel/" . $NamaGambar)) {
                    hapusGambar($oldgambar, "artikel");
                    createThumb($gambar, 'artikel', $NamaGambar);
                    $query = "UPDATE artikel SET judul='$judul', isi='$isi', gambar='$NamaGambar'  WHERE id_artikel='$id_artikel'";
                    $sql = mysqli_query($conn, $query) or die("cek : " . mysqli_error($conn));
    
                    if ($sql) {
                        url("artikel&con=2&alert=Artikel berhasil diupdate!");
                    } else {
                        url("artikel&con=3&alert=Gagal mengupdate artikel!");
                    }
                    if ($sql) {
                        url("artikel&con=0");
                    } else {
                        url("artikel&con=1");
                    }
                } else {
                    echo $query;
                    url("artikel&con=9");
                }
            }
            break;
    
        case 'delete':
            $id = $_GET['id'];
            $query = "DELETE FROM artikel WHERE id_artikel='$id'";
            $sql = mysqli_query($conn, $query) or die("cek : " . mysqli_error($conn));
            if ($sql) {
                url("artikel&con=4");
            } else {
                url("artikel&con=5&alert=Gagal menghapus artikel");
            }
            break;
        default:
            break;
}


?>