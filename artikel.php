<?php
include './templates/navbar.php';
require('koneksi.php');
$result = mysqli_query($koneksi, "SELECT * FROM artikel");
?>

<div class="container mx-auto px-8 mt-10">
    <h1 class="text-3xl font-semibold mb-4">Artikel Kami</h1>
    <p class="">Selamat datang di Artikel Web GenBI Komisariat Politeknik Negeri Batam.</p>
</div>

<div class="lg:p-6 w-full">
    <?php foreach ($result as $index => $row) : ?>
        <div class="p-6 mb-5 w-full bg-white shadow-2xl">
            <div class="flex items-center gap-3">
                <img src="assets/img/<?= $row['img'] ?>" class="w-96 object-cover rounded-md transition-transform duration-300 transform hover:scale-95" alt="">
                <div class="">
                    <div class="mb-3">
                        <a href="artikel_detail.php?id=<?= $row['artikel_id'] ?>" class="hover:text-blue-800 font-medium text-lg line-clamp-2"><?= $row['judul'] ?></a>
                        <div class="flex items-center gap-2">
                            <h3 class="text-sm text-slate-400 line-clamp-2">Oleh <?= $row['penulis'] ?></h3>
                            <h3 class="text-sm text-slate-400 line-clamp-2"><?= date('d/m/Y', strtotime($row['tanggal_upload'])) ?></h3>
                        </div>
                    </div>
                    <p class="text-sm line-clamp-3 text-justify"><?= $row['description'] ?></p>
                    <a href="artikel_detail.php?id=<?= $row['artikel_id'] ?>" class="text-blue-500 hover:underline cursor-pointer">Read More</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>


<?php
include './templates/footer.php'
?>