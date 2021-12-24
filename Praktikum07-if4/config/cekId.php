<?php
function cekId($table, $field) {
    include 'db_conn.php';

    $sql = mysqli_query($conn,"SELECT $field FROM $table ORDER BY $field DESC LIMIT 1") ;
    $hasil = mysqli_fetch_array($sql);
    $hasil2=$hasil[0] ?? null;
    $idbaru = (intval(substr($hasil2, -4))) + 1;
    $digit = 4 - (strlen($idbaru));
    for ($i = 0; $i < $digit; $i++) {
        $idbaru = "0" . $idbaru;
    }
    return $idbaru;
}
?>
