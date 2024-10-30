<?php
ob_start();

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "inventaris";

// membuat koneksi
$koneksi = new mysqli("$host", "$dbuser", "$dbpass", "$dbname");

// pengecekan koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal :" . $koneksi->connect_error);
}
// else
// {
//     echo "berhasil";
// }
