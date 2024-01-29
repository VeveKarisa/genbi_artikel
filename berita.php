<?php
include './templates/navbar.php';
require('koneksi.php');
$result = mysqli_query($koneksi, "SELECT * FROM berita");
?>

<div class="container mx-auto px-8 mt-10">
    <h1 class="text-3xl font-semibold mb-4">Berita Terkini</h1>
    <p class="">Selamat membaca update berita terkini, sumber dari
        <a href="https://www.bi.go.id/id/default.aspx" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline">Bank Indonesia</a>
    </p>

</div>

<div class="lg:p-6 px-7">
    <?php foreach ($result as $index => $row) : ?>
        <div class="p-6 mb-5 w-full bg-white shadow-2xl">
            <div class="lg:flex md:flex items-center gap-3 lg:w-full md:w-full mx-auto lg:mx-0 md:mx-0">
                <img src="assets/img/<?= $row['img'] ?>" class="w-96 object-cover rounded-md transition-transform duration-300 transform hover:scale-95" alt="">
                <div class="">
                    <div class="mb-3">
                        <a href="artikel_detail.php?id=<?= $row['berita_id'] ?>" class="hover:text-blue-800 font-medium text-lg line-clamp-2"><?= $row['judul'] ?></a>
                        <div class="flex items-center gap-2">
                            <h3 class="text-sm text-slate-400 line-clamp-2">Oleh <?= $row['penulis'] ?></h3>
                            <h3 class="text-sm text-slate-400 line-clamp-2"><?= date('d/m/Y', strtotime($row['tanggal_upload'])) ?></h3>
                        </div>
                    </div>
                    <p class="text-sm line-clamp-3 text-justify"><?= $row['description'] ?></p>
                    <a href="berita_detail.php?id=<?= $row['berita_id'] ?>" class="text-blue-500 hover:underline cursor-pointer">Read More</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>


<?php
include './templates/footer.php'
?>