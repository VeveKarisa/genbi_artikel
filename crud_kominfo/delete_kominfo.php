<?php
include '../koneksi.php';
$kominfo_id = $_POST["kominfo_id"];
//mengambil id yang ingin dihapus

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM kominfo WHERE kominfo_id='$kominfo_id'";
$hasil_query = mysqli_query($koneksi, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
    die("Gagal menghapus data: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil dihapus.');window.location='../Pages/divisi.php';</script>";
}
