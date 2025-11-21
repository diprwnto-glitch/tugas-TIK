<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_bukutamu");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM buku_tamu WHERE id = $id";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: admin.php"); // Redirect kembali ke halaman admin
        exit();
    } else {
        echo "Error menghapus data: " . mysqli_error($koneksi);
    }
}
?>
