<?php
include '../koneksi.php';
$artikel_id = $_POST["artikel_id"];
//mengambil id yang ingin dihapus

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM artikel WHERE artikel_id='$artikel_id'";
$hasil_query = mysqli_query($koneksi, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
    die("Gagal menghapus data: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil dihapus.');window.location='../Pages';</script>";
}
