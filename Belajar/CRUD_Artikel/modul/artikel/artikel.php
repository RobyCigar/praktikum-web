<?php
include "config/cekId.php";
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $link = "modul/artikel/aksi_artikel.php";
    switch (isset($_GET['act'])) {
        case 'editor':
            if (isset($_GET['id'])) {
                $query = mysqli_query($conn, "select * from artikel where id_artikel='$_GET[id]'");
                $result = mysqli_fetch_array($query);
                $id_artikel = $result['id_artikel'];
                $judul = $result['judul'];
                $isi = $result['isi'];
                $gambar = $result['gambar'];
                $aksi = "update";
                $readonly = "readonly";
            } else {
                $id_artikel = "A" . cekId("artikel", "id_artikel");
                $judul = "";
                $isi = "";
                $gambar = "";
                $aksi = "insert";
                $readonly = "";
            }
?>
            <div class="container">
                <h3><?= strtoupper($aksi) ?> Artikel</h3>
                <form action="<?php echo $link; ?>?menu=artikel&act=<?php echo $aksi; ?>" method=post id="frmmodul" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nama">id_artikel anda:</label>
                        <input type="text" readonly class="form-control" <?php echo $readonly; ?> id="id_artikel" name="id_artikel" value="<?php echo $id_artikel; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">judul anda:</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Artikel:</label>
                        <textarea class="form-control" name="isi" id="exampleFormControlTextarea1" rows="3"><?php echo $isi; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Gambar:</label>
                        <input type="file" id="gambar" class="form-control" name="gambar" value="<?php echo $gambar; ?>">
                        <?php
                        if ($aksi == "update") {
                            echo '<img src="upload/thumbs/artikel/' . $gambar . '" height=106px width=auto>';
                            echo '<input type="hidden" name="oldgambar" value="' . $gambar . '">';
                        }
                        ?>
                    </div>
                    <input type="submit" class="btn btn-primary"></input>

                </form>
            </div>
        <?php
            break;
        default:
            $query = mysqli_query($conn, "SELECT * FROM artikel") or die("Query error : " . mysqli_error($query));
        ?>
            <div class="container">
                <center>
                    <h3>Menu Artikel</h3>
                    <button type="button" class="btn btn-primary" onclick="location.href='?menu=artikel&act=editor'">Tambah</button>
                </center>
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id_artikel</th>
                            <th>judul</th>
                            <th>isi</th>
                            <th>gambar</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_array($query)) {
                            echo '<tr><td>' . $no . '</td>
                        <td>' . $row[0] . '</td>
                        <td>' . $row[1] . '</td>
                        <td>' . $row[2] . '</td>
                        <td style="width: 80px"> <img src="upload/thumbs/artikel/' . $row[3] . '" width="100%" height=auto></td>
                        <td><a href="?menu=artikel&act=editor&id=' . $row[0] . '">Edit </a>||
                            <a onclick="return confirm(\'Apakah anda yakin akan menghapus?\')"
                                href="' . $link . '?menu=modul&act=delete&id=' . $row[0] . '">Hapus</a>
                        </td></tr>';
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
<?php
    }
}
?>