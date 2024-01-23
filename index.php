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
    $result = mysqli_query($koneksi, "SELECT * FROM artikel");
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

    <div class="grid grid-cols-2 w-full">

        <div class="p-6 w-full">
            <a href="#" class="text-3xl text-slate-600 hover:underline">Artikel Kami</a>
            <div class="w-full my-5 gap-10 ">
                <?php foreach ($result as $index => $row) : ?>
                    <div class="my-5">
                        <div class="flex justify-between items-center mb-1">
                            <h3 class="font-medium text-lg line-clamp-2"><?= $row['judul'] ?></h3>
                            <div class="flex items-center gap-2">
                                <h3 class="text-sm text-slate-400 line-clamp-2">Oleh <?= $row['penulis'] ?></h3>
                                <h3 class="text-sm text-slate-400 line-clamp-2"><?= $row['tanggal_upload'] ?></h3>
                            </div>
                        </div>
                        <div class="rounded-md flex flex-col">
                            <div class="w-full">
                                <img src="assets/img/<?= $row['img'] ?>" class="w-full h-60 object-cover rounded-md  transition-transform duration-300 transform hover:scale-95" alt="">
                                <div class="description-container">
                                    <p id="descriptionText" class="text-sm line-clamp-3 text-justify"><?= $row['description'] ?></p>
                                    <button id="readMoreBtn" class="text-blue-500 hover:underline cursor-pointer">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="p-6 w-full">
            tes
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

    <script>
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
    </script>

</body>

</html>