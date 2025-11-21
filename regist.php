<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_bukutamu");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Status Register</title>
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
            <a href='beranda.html'>Beranda</a>
            <a href='Biodata_Siswa.html'>Biodata</a>
            <a href='Buku_Tamu.html'>Buku Tamu</a>
        </div>
    </div>
    <div class='content-container' style='text-align: center;'>
        <h2>Status Register</h2>";

    if (mysqli_query($koneksi, $sql)) {
        echo "<p>Register berhasil! <a href='login.html'>Login sekarang</a></p>";
    } else {
        echo "<p>Error: " . mysqli_error($koneksi) . "</p>";
    }

    echo "</div>
    <footer>
        &copy; 2025 • Rekayasa Perangkat Lunak • SMK Negeri 1 Pasuruan • Adi Purwanto Ramadhani
    </footer>
    </body>
    </html>";
}
?>
