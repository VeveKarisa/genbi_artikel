<?php
include '../koneksi.php';

$kesmas_id = $_POST['kesmas_id'];
$nama_divisi = $_POST['nama_divisi'];
$koor = $_POST['koor'];
$sekre = $_POST['sekre'];
$benda = $_POST['benda'];
$anggota_satu = $_POST['anggota_satu'];
$anggota_dua = $_POST['anggota_dua'];
$anggota_tiga = $_POST['anggota_tiga'];
$anggota_empat = $_POST['anggota_empat'];
$anggota_lima = $_POST['anggota_lima'];
$anggota_enam = $_POST['anggota_enam'];
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
        $query = "UPDATE kesmas SET nama_divisi='$nama_divisi', koor='$koor', sekre='$sekre', benda='$benda', anggota_satu='$anggota_satu', anggota_dua='$anggota_dua', anggota_tiga='$anggota_tiga', anggota_empat='$anggota_empat', anggota_lima='$anggota_lima', anggota_enam='$anggota_enam', img='$new_image_name' WHERE kesmas_id='$kesmas_id'";
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
    $query = "UPDATE kesmas SET nama_divisi='$nama_divisi', koor='$koor', sekre='$sekre', benda='$benda', anggota_satu='$anggota_satu', anggota_dua='$anggota_dua', anggota_tiga='$anggota_tiga', anggota_empat='$anggota_empat', anggota_lima='$anggota_lima', anggota_enam='$anggota_enam' WHERE kesmas_id='$kesmas_id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='../Pages/divisi.php';</script>";
    }
}
