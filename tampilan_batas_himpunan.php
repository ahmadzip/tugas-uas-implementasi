<!-- tampilan_batas_himpunan.php -->
<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$position = $_SESSION['position'];
if ($position !== "kepalasekolah") {
    echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
    exit();
}
//letek implementasi
$bahasaquery = "SELECT * FROM tb_basis_himpunan";
$hasilnya = $conn->query($bahasaquery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tampilan Batas Himpunan</title>
</head>

<body>
    <h2>Tampilan Batas Himpunan</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Report Min</th>
            <th>Report Max</th>
        </tr>
        <?php
        while ($row = $hasilnya->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_basis_himpunan'] . "</td>";
            echo "<td>" . $row['report_min'] . "</td>";
            echo "<td>" . $row['report_max'] . "</td>";
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