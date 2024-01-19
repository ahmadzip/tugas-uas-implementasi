<!-- perhitungan_tsukamoto.php -->
<?php
include 'koneksi.php';

// ini example saja
function calculateFuzzyLogic($nilai_raport, $penghasilan_ortu, $tanggungan_ortu)
{
    $hasil_perhitungan = ($nilai_raport * 0.3) + ($penghasilan_ortu * 0.5) + ($tanggungan_ortu * 0.2);
    return $hasil_perhitungan;
}
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$position = $_SESSION['position'];
$nilai_raport = isset($_POST['nilai_raport']) ? $_POST['nilai_raport'] : 0;
$penghasilan_ortu = isset($_POST['penghasilan_ortu']) ? $_POST['penghasilan_ortu'] : 0;
$tanggungan_ortu = isset($_POST['tanggungan_ortu']) ? $_POST['tanggungan_ortu'] : 0;

if ($position === "bk") {
    $hasil_perhitungan = calculateFuzzyLogic($nilai_raport, $penghasilan_ortu, $tanggungan_ortu);
    if ($hasil_perhitungan != 0) {
        echo "<h2>Hasil Perhitungan Logika Fuzzy:</h2>";
        echo "<p>Nilai Raport: $nilai_raport</p>";
        echo "<p>Penghasilan Orang Tua: $penghasilan_ortu</p>";
        echo "<p>Jumlah Tanggungan Orang Tua: $tanggungan_ortu</p>";
        echo "<p>Hasil Perhitungan: $hasil_perhitungan</p>";
    } else {
        echo "<h2>Hasil Perhitungan Logika Fuzzy:</h2>";
        echo "<p>Hasil perhitungan adalah 0, tidak ditampilkan.</p>";
    }
} elseif ($position === "kepalasekolah") {
    echo "<h2>Proses Kepala Sekolah</h2>";
} else {
    echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
    exit();
}
//letek implementasi
$bahasaquery_basis_himpunan = "SELECT * FROM tb_basis_himpunan";
$hasilnya_basis_himpunan = $conn->query($bahasaquery_basis_himpunan);
echo "<h2>Batas Himpunan:</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Report Min</th><th>Report Max</th></tr>";
while ($row = $hasilnya_basis_himpunan->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id_basis_himpunan'] . "</td>";
    echo "<td>" . $row['report_min'] . "</td>";
    echo "<td>" . $row['report_max'] . "</td>";
    echo "</tr>";
}
echo "</table>";
//letek implementasi
$bahasaquery_data_siswa = "SELECT * FROM tb_data_siswa";
$hasilnya_data_siswa = $conn->query($bahasaquery_data_siswa);
echo "<h2>Data Siswa:</h2>";
echo "<table border='1'>";
echo "<tr><th>NIS</th><th>Nama Siswa</th><th>Nilai Raport</th></tr>";
while ($row = $hasilnya_data_siswa->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['nis'] . "</td>";
    echo "<td>" . $row['nama_siswa'] . "</td>";
    echo "<td>" . $row['nilai_raport'] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br><a href=\"menu_setelah_login.php\">Kembali ke Menu</a>";
echo "<br><a href=\"logout.php\">Logout</a>";
?>