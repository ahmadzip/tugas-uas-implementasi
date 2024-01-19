<!-- login.php -->
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //letek implementasi
    $bahasaquery = "SELECT * FROM tb_login WHERE username='$username' AND password='$password'";
    $hasil = $conn->query($bahasaquery);
    if ($hasil->num_rows == 1) {
        $row = $hasil->fetch_assoc();
        $position = $row['posisi'];
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['position'] = $position;
        header("Location: menu_setelah_login.php");
        exit();
    } else {
        $jikaadaerror = "Login gagal. Periksa username dan password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (isset($jikaadaerror)) {
        echo "<p>$jikaadaerror</p>";
    } ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Masukkan username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Masukkan password" required><br>
        <input type="submit" value="LoginKan">
    </form>
</body>

</html>