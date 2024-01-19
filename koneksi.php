<!-- koneksi.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Sistem_Evaluasi_BSM";

$koenskiku = new mysqli($servername, $username, $password, $dbname);

if ($koenskiku->connect_error) {
    die("Koneksi gagal error nya ini yakk: " . $koenskiku->connect_error);
}
?>