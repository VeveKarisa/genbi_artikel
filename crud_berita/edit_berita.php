<?php
include '../koneksi.php';

$berita_id = $_POST['berita_id'];
$judul = $_POST['judul'];
$description = $_POST['description'];
$penulis = $_POST['penulis'];
$tanggal_upload = $_POST['tanggal_upload'];
$image = $_FILES['image']['name'];

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
        $query = "UPDATE berita SET judul='$judul', description='$description', penulis='$penulis', img='$new_image_name', tanggal_upload='$tanggal_upload' WHERE berita_id='$berita_id'";
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
    $query = "UPDATE berita SET judul='$judul', description='$description', penulis='$penulis', tanggal_upload='$tanggal_upload' WHERE berita_id='$berita_id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambah.');window.location='../Pages/berita.php';</script>";
    }
}
