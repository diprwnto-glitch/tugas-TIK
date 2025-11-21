<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

$koneksi = mysqli_connect("localhost", "root", "", "db_bukutamu");
$sql = "SELECT * FROM buku_tamu";
$hasil = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku Tamu</title>
    <link rel="stylesheet" href="desain.css">
</head>
<body>

<div class="header-navbar">
    <div class="logo">
        <img src="smk favorit.jpg" alt="Logo">
        <div>
            <h2>SMKN 1 PASURUAN</h2>
            <p>REKAYASA PERANGKAT LUNAK</p>
        </div>
    </div>
    <div class="admin-header-links">
        <h3>Halo, <?php echo $_SESSION['username']; ?>!</h3>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="content-container">
    <h2>Data Buku Tamu</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama_tamu']; ?></td>
                <td><?= $row['alamat_tamu']; ?></td>
                <td><?= $row['notelp_tamu']; ?></td>
                <td><?= $row['pesan_tamu']; ?></td>
                <td><a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<footer>
    &copy; 2025 • Rekayasa Perangkat Lunak • SMK Negeri 1 Pasuruan • Adi Purwanto Ramadhani
</footer>

</body>
</html>
