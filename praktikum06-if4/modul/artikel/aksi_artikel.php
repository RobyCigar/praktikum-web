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
    if ($act == 'update') {$oldgambar = $_POST['oldgambar'];}
    $gambar = ($_FILES['gambar']['name']);
} else {
    $id = $_GET['id_artikel'];
    $oldgambar = $_GET['oldgambar'];
}

switch ($act) {
    case 'insert':
        // code disini
        break;
    case 'update':
        // code disini
        break;

    case 'delete':
        // code disini
        break;
    default:
        break;
}
?>
