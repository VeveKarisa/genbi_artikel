<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>

<body class="font-sans">

    <?php include './templates/navbar.php'; ?>
    <?php
    $result = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY tanggal_upload DESC LIMIT 3");
    $berita = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal_upload DESC LIMIT 4");
    ?>


    <div class="relative">
        <!-- Carousel -->
        <div class="slick-carousel">
            <div class="carousel-item bg-cover bg-no-repeat bg-center bg-fixed" style="background-image: url('assets/img/Genbi 1.jpg'); height: 100vh;"></div>
            <div class="carousel-item bg-cover bg-no-repeat bg-center bg-fixed" style="background-image: url('assets/img/Genbi 2.jpeg'); height: 100vh;"></div>
            <!-- Tambahkan lebih banyak item carousel sesuai kebutuhan -->
        </div>

        <!-- Teks di atas Carousel -->
        <div class="absolute inset-0 flex items-center justify-center text-white text-center">
            <div class="max-w-2xl mx-auto p-8">
                <h1 class="text-4xl font-black mb-4">GenBI Komisariat Polibatam</h1>
                <p>#Energi Untuk Negeri #Kite orang luar biase</p>
            </div>
        </div>
    </div>

    <div class="inline-flex items-center justify-center w-full transition-transform duration-300 transform hover:scale-110">
        <hr class="w-64 h-1 my-8 bg-gray-500 border-0 rounded dark:bg-gray-700 ">
        <div class="absolute px-4 -translate-x-1/2 bg-white left-1/2 dark:bg-gray-900">
            <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
            </svg>
        </div>
    </div>


    <div class="grid grid-cols-2 w-full gap-10">

        <div class="p-6 w-full">
            <div class="flex items-center justify-between">
                <a href="#" class="text-3xl text-slate-600 hover:underline">Artikel Kami</a>
                <a href="artikel.php" class="text-2xl text-blue-500 hover:underline">Selengkapnya</a>
            </div>
            <div class="w-full my-5 gap-10 ">
                <?php foreach ($result as $index => $row) : ?>
                    <div class="my-5">
                        <div class="flex justify-between items-center mb-1">
                            <a href="artikel_detail.php?id=<?= $row['artikel_id'] ?>" class="hover:text-blue-800 font-medium text-lg line-clamp-2"><?= $row['judul'] ?></a>
                            <div class="flex items-center gap-2">
                                <h3 class="text-sm text-slate-400 line-clamp-2">Oleh <?= $row['penulis'] ?></h3>
                                <h3 class="text-sm text-slate-400 line-clamp-2"><?= date('d/m/Y', strtotime($row['tanggal_upload'])) ?></h3>
                            </div>
                        </div>
                        <div class="rounded-md flex flex-col">
                            <div class="w-full">
                                <img src="assets/img/<?= $row['img'] ?>" class="w-full h-60 object-cover rounded-md transition-transform duration-300 transform hover:scale-95" alt="">
                                <div class="description-container">
                                    <p id="descriptionText" class="text-sm line-clamp-3 text-justify"><?= $row['description'] ?></p>
                                    <a href="artikel_detail.php?id=<?= $row['artikel_id'] ?>" class="text-blue-500 hover:underline cursor-pointer">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="p-6 w-full">
            <div class="flex items-center justify-between">
                <a href="#" class="text-3xl text-slate-600 hover:underline">Update BI</a>
                <a href="berita.php" class="text-2xl text-blue-500 hover:underline">Selengkapnya</a>
            </div>
            <div class="w-full my-5">
                <?php foreach ($berita as $index => $row) : ?>
                    <div class="grid grid-cols-2 my-5 gap-3">
                        <div class="rounded-md w-full">
                            <img src="assets/img/<?= $row['img'] ?>" class="w-full h-60 object-cover rounded-md transition-transform duration-300 transform hover:scale-95" alt="">
                        </div>
                        <div class="items-center mb-1">
                            <a href="berita_detail.php?id=<?= $row['berita_id'] ?>" class="hover:text-blue-800 font-medium text-lg line-clamp-2"><?= $row['judul'] ?></a>
                            <h3 class="text-sm text-slate-400 line-clamp-2"><?= date('d/m/Y', strtotime($row['tanggal_upload'])) ?></h3>
                            <div class="description-container">
                                <p id="descriptionText" class="text-sm line-clamp-3 text-justify"><?= $row['description'] ?></p>
                                <a href="berita_detail.php?id=<?= $row['berita_id'] ?>" class="text-blue-500 hover:underline cursor-pointer">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </div>

    <?php include './templates/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.slick-carousel').slick({
                dots: true,
                autoplay: true,
                autoplaySpeed: 4000,
                speed: 600, // Atur kecepatan sliding (ms)
                easing: 'ease', // Atur efek easing, contoh: 'linear', 'ease-in-out', dll.
            });
        });
    </script>

    <!-- <script>
        const descriptionText = document.getElementById('descriptionText');
        const readMoreBtn = document.getElementById('readMoreBtn');

        let isExpanded = false;

        readMoreBtn.addEventListener('click', function() {
            isExpanded = !isExpanded;

            if (isExpanded) {
                descriptionText.style.webkitLineClamp = 'unset'; // Remove line clamp
                readMoreBtn.innerText = 'Read Less';
            } else {
                descriptionText.style.webkitLineClamp = '2'; // Apply line clamp to 2 lines
                readMoreBtn.innerText = 'Read More';
            }
        });
    </script> -->

</body>

</html>