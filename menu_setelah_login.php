<!-- menu_setelah_login.php -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$position = $_SESSION['position'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu Setelah Login</title>
</head>

<body>
    <h2>Selamat Datang,
        <?php echo $_SESSION['username']; ?>!
    </h2>
    <h3>Menu:</h3>
    <?php
    if ($position === "bk") {
        echo '<a href="tampilan_data_siswa.php">Tampilan Data Siswa</a><br>';
    } elseif ($position === "kepalasekolah") {
        echo '<a href="tampilan_batas_himpunan.php">Tampilan Batas Himpunan</a><br>';
    }
    echo '<a href="perhitungan_tsukamoto.php">Perhitungan Tsukamoto</a><br>';
    ?>
    <br>
    <a href="logout.php">Logout</a>
</body>

</html>