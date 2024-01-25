<?php
include '../koneksi.php';

$inti_id = $_POST['inti_id'];
$nama_divisi = $_POST['nama_divisi'];
$ketua = $_POST['ketua'];
$wakil = $_POST['wakil'];
$sekre_satu = $_POST['sekre_satu'];
$sekre_dua = $_POST['sekre_dua'];
$benda_satu = $_POST['benda_satu'];
$benda_dua = $_POST['benda_dua'];
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
        $query = "UPDATE inti SET nama_divisi='$nama_divisi', ketua='$ketua', wakil='$wakil', sekre_satu='$sekre_satu', sekre_dua='$sekre_dua', benda_satu='$benda_satu', benda_dua='$benda_dua', img='$new_image_name' WHERE inti_id='$inti_id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambah.');window.location='../Pages/berita.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../Pages/berita.php';</script>";
    }
} else {
    $query = "UPDATE inti SET nama_divisi='$nama_divisi', ketua='$ketua', wakil='$wakil', sekre_satu='$sekre_satu', sekre_dua='$sekre_dua', benda_satu='$benda_satu', benda_dua='$benda_dua' WHERE inti_id='$inti_id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='../Pages/divisi.php';</script>";
    }
}
