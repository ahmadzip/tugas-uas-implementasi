<!-- tampilan_data_siswa.php -->
<?php
include 'koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$position = $_SESSION['position'];
if ($position !== "bk") {
    echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
    exit();
}
$bahasaquery = "SELECT * FROM tb_data_siswa";
$hasilnya = $conn->query($bahasaquery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tampilan Data Siswa</title>
</head>

<body>
    <h2>Tampilan Data Siswa</h2>
    <table border="1">
        <tr>
            <th>NIS</th>
            <th>Nama Siswa</th>
        </tr>
        <?php
        while ($row = $hasilnya->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nis'] . "</td>";
            echo "<td>" . $row['nama_siswa'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="menu_setelah_login.php">Kembali ke Menu</a>
    <br>
    <a href="logout.php">Logout</a>
</body>

</html>