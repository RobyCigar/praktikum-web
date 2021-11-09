<?php
$hal = (isset($_GET['menu'])) ? $_GET['menu'] : 'home';
if (file_exists('modul/' . $hal . '/' . $hal . '.php')) {
    include 'modul/' . $hal . '/' . $hal . '.php';
} else {
    echo "<p><b>Modul modul nggak ada</b></p>";
}
