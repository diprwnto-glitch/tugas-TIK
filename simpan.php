<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_tamu'];
    $alamat = $_POST['alamat_tamu'];
    $notelp = $_POST['notelp_tamu'];
    $pesan = $_POST['pesan_tamu'];

    $koneksi = mysqli_connect("localhost", "root", "", "db_bukutamu");
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO buku_tamu (nama_tamu, alamat_tamu, notelp_tamu, pesan_tamu)
            VALUES ('$nama', '$alamat', '$notelp', '$pesan')";

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Status Simpan</title>
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
    <div class='content-container' style='text-align: center; max-width: 600px; margin: 40px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);'>
        <h2>Status Penyimpanan Data</h2>
        <hr>";

    if (mysqli_query($koneksi, $sql)) {
        echo "<p>Data berhasil disimpan!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($koneksi) . "</p>";
    }

    echo "<p><a href='Buku_Tamu.html'>Kembali</a> | <a href='login.html'>Login Admin</a></p>
    </div>
    <footer>
        &copy; 2025 • Rekayasa Perangkat Lunak • SMK Negeri 1 Pasuruan • Adi Purwanto Ramadhani
    </footer>
    </body>
    </html>";

    mysqli_close($koneksi);
}
?>
