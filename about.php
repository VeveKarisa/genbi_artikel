<?php
include './templates/navbar.php';
require('koneksi.php');
$result = mysqli_query($koneksi, "SELECT * FROM book");
?>

<div class="container mx-auto px-8 my-10">
    <h1 class="text-3xl font-semibold mb-4">Tentang Kami</h1>
    <p class="">Selamat datang di web Tobukas, melalui web ini anda dapat menginput data persediaan buku yang dibutuhkan.</p>
</div>

<div class="container mx-auto px-8 mb-10">
    <h1 class="text-3xl font-semibold mb-4">Alamat</h1>
    <p class="">Jl. Ibnu Sina Batam 29432</p>
    <iframe width="100%" height="300" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.702639114781!2d106.84558451476812!3d-6.208817995485848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f50c15a86f61%3A0xc45c8c80c65bbfa1!2sYour%20Place%20Name!5e0!3m2!1sen!2sid" allowfullscreen></iframe>
</div>

<div class="container mx-auto px-8 mb-10">
    <h1 class="text-3xl font-semibold mb-4">Hubungi Kami</h1>
    <p class="">Telephone : +62 88 77 6534</p>
    <p class="">Email : tobukas@gmail.com</p>
</div>

<?php
include './templates/footer.php'
?>