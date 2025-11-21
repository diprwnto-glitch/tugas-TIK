<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db_bukutamu");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Status Login</title>
        <link rel='stylesheet' href='desain.css'>
    </head>
    <body>
    <div class='header-navbar'>
        <div class='logo'>
            <img src='smk favorit.jpg' alt='Logo'>
            <div>
                <h2>SMKN 1 PASURUAN</h2>
                <p>REKAYASA PERANGKAT LUNAK</p>
            </div>
        </div>
        <div class='nav-links'>
            <a href='index.html'>Beranda</a>
            <a href='Biodata_Siswa.html'>Biodata</a>
            <a href='Buku_Tamu.html'>Buku Tamu</a>
        </div>
    </div>
    <div class='content-container' style='text-align: center;'>
        <h2>Status Login</h2>";

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        echo "<p>Login berhasil! Halaman akan dialihkan ke halaman admin.</p>";
        header("refresh:3; url=admin.php");
    } else {
        echo "<p>Login gagal! <a href='login.html'>Coba lagi</a></p>";
    }

    echo "</div>
    <footer>
        &copy; 2025 • Rekayasa Perangkat Lunak • SMK Negeri 1 Pasuruan • Adi Purwanto Ramadhani
    </footer>
    </body>
    </html>";
}
?>
