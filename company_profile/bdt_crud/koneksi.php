<?php
$host ="localhost";
$user = "root";
$pass = "";
$db ="bdt";

// untuk mengkoneksikan database
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (! $koneksi) {
    die("Gagal terkoneksi:");
}
?>