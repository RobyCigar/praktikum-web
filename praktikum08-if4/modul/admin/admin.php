<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $link = "modul/admin/aksi_admin.php";
    switch (isset($_GET['act'])) {
        case 'editor':
            if (isset($_GET['id'])) {
                $query = mysqli_query($conn,"select * from users where id='$_GET[id]'");
                $result = mysqli_fetch_array($query);
                $username = $result['username'];
                $password = $result['password'];
                $aksi = "update";
                $readonly="readonly";
            } else {
                $username = "";
                $password = "";
                $aksi = "insert";
                $readonly="";
            }
            ?>
            <div class="container">
            <h3>Insert Admin</h3> 
            <form action="<?php echo $link; ?>?menu=admin&act=<?php echo $aksi; ?>" method=post id="frmmodul">
                
            <div class="form-group">
            <label for="nama">Username anda:</label>
            <input type="text" class="form-control" <?php echo $readonly;?> id="username" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
            <label for="alamat">Password anda:</label>
            <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
            </div>      
            <input type="submit" class="btn btn-primary"></input>
            
                </form>
            </div>
            <?php
            break;
            default:
            $query = mysqli_query($conn,"SELECT * FROM users") or die("Query error : " . $conn->error);
            ?>
            <div class="container">
            <center>
            <h3>Menu Admin/User</h3>
            <button type="button" class="btn btn-primary" onclick="location.href='?menu=admin&act=editor'">Tambah</button>
            </center>
                <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<tr><td>' . $no . '</td>
                        <td>' . $row[1] . '</td>
                        <td>' . $row[2] . '</td>
                        <td><a href="?menu=admin&act=editor&id=' . $row[0] . '">Edit </a>||
                            <a onclick="return confirm(\'Apakah anda yakin akan menghapus?\')"
                                href="' . $link . '?menu=modul&act=delete&id='. $row[0].'">Hapus</a>
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