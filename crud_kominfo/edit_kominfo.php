<?php
include '../koneksi.php';

$kominfo_id = $_POST['kominfo_id'];
$nama_divisi = $_POST['nama_divisi'];
$koor = $_POST['koor'];
$sekre = $_POST['sekre'];
$benda = $_POST['benda'];
$anggota_satu = $_POST['anggota_satu'];
$anggota_dua = $_POST['anggota_dua'];
$anggota_tiga = $_POST['anggota_tiga'];
$anggota_empat = $_POST['anggota_empat'];
$image = $_FILES['image']['name'];;

// echo "<pre>";
// print_r([$name, $description, $price, $stock, $image, $discount]);
// echo "</pre>";
// die;

if ($image != '') {
    $allowed_type = ['png', 'jpg', 'jpeg'];
    $type = explode('.', $image);
    $types = strtolower(end($type));
    $file_tmp = $_FILES['image']['tmp_name'];
    $random = rand(1, 999);
    $new_image_name = $random . '-' . $image;

    if (in_array($types, $allowed_type) === true) {
        move_uploaded_file($file_tmp, '../assets/img/' . $new_image_name);
        $query = "UPDATE kominfo SET nama_divisi='$nama_divisi', koor='$koor', sekre='$sekre', benda='$benda', anggota_satu='$anggota_satu', anggota_dua='$anggota_dua', anggota_tiga='$anggota_tiga', anggota_empat='$anggota_empat', img='$new_image_name' WHERE kominfo_id='$kominfo_id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambah.');window.location='../Pages/divisi.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../Pages/divisi.php';</script>";
    }
} else {
    $query = "UPDATE kominfo SET nama_divisi='$nama_divisi', koor='$koor', sekre='$sekre', benda='$benda', anggota_satu='$anggota_satu', anggota_dua='$anggota_dua', anggota_tiga='$anggota_tiga', anggota_empat='$anggota_empat' WHERE kominfo_id='$kominfo_id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='../Pages/divisi.php';</script>";
    }
}
