<?php
include './templates/navbar.php';
require('koneksi.php');

// Ambil nilai berita_id dari parameter URL
$berita_id = isset($_GET['id']) ? $_GET['id'] : null;

// Pastikan berita_id tidak kosong dan hanya berisi angka
if ($berita_id && is_numeric($berita_id)) {
    // Query untuk mengambil detail berita berdasarkan berita_id
    $query = "SELECT * FROM berita WHERE berita_id = $berita_id";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Ambil data berita
        $berita = mysqli_fetch_assoc($result);

        // Tampilkan detail berita
        if ($berita) {
?>

            <div style="width: 100%; max-width: 100%;">
                <img src="assets/img/header_artikel.png" alt="header" style="width: 100%; max-width: 100%;" />
            </div>
            <div class="p-4 flex items-center">
                <img src="assets/img/Genbi komsat batam bulat.png" alt="header" class="w-32" />
                <div class="text-slate-500">
                    <p>Divisi Komunikasi dan Informasi</p>
                    <p>GenBI Komisariat Polibatam</p>
                    <div class="bg-blue-700 text-white px-3 py-1 w-fit mt-1 rounded-2xl"><?= $berita['tanggal_upload'] ?></div>
                </div>
            </div>
            <hr>
            <div class="p-4 lg:flex md:flex gap-10 ">
                <div class="items-center lg:w-2/3 md:w-2/3 w-full">
                    <h2 class="lg:text-3xl md:text-3xl text-xl font-medium mb-3"><?= $berita['judul'] ?></h2>
                    <img src="assets/img/<?= $berita['img'] ?>" alt="<?= $berita['judul'] ?>" class="w-full">
                    <p class="text-justify"><?= $berita['description'] ?></p>
                </div>
                <hr class="lg:hidden md:hidden my-6">
                <div class="items-center">
                    <h2 class="lg:text-3xl md:text-3xl text-xl font-medium mb-3">Sosmed Kami</h2>

                    <!-- Instagram -->
                    <div class="text-slate-600 uppercase">Instagram Kami</div>
                    <a href="https://www.instagram.com/genbipolibatam/" data-te-ripple-init data-te-ripple-color="light" class="transition-transform duration-300 transform hover:scale-95 mb-2 inline-block rounded px-4 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #c13584">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <hr>

                    <!-- Youtube -->
                    <div class="text-slate-600 uppercase">Saluran Youtube Kami</div>
                    <a href="https://www.youtube.com/@genbipolibatam932" data-te-ripple-init data-te-ripple-color="light" class="transition-transform duration-300 transform hover:scale-95 mb-2 inline-block rounded px-4 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #ff0000">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                        </svg>
                    </a>
                    <hr>

                    <!-- TikTok -->
                    <div class="text-slate-600 uppercase">Akun Tiktok Kami</div>
                    <a href="#" data-te-ripple-init data-te-ripple-color="light" class="transition-transform duration-300 transform hover:scale-95 mb-2 inline-block rounded px-4 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #6a76ac">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6 w-6">
                            <path fill="currentColor" d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                        </svg>
                    </a>
                    <hr>

                    <!-- Google -->
                    <div class="text-slate-600 uppercase">Email Kami</div>
                    <a href="#" data-te-ripple-init data-te-ripple-color="light" class="transition-transform duration-300 transform hover:scale-95 mb-2 inline-block rounded px-4 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #ea4335">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z" fill-rule="evenodd" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <hr>


                    <!-- <button type="button" data-te-ripple-init data-te-ripple-color="light" class="transition-transform duration-300 transform hover:scale-95 mb-2 inline-block rounded px-4 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #1877f2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                    </button>

                  
                    <button type="button" data-te-ripple-init data-te-ripple-color="light" class="transition-transform duration-300 transform hover:scale-95 mb-2 inline-block rounded px-4 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #0077b5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                        </svg>
                    </button>


               
                    <button type="button" data-te-ripple-init data-te-ripple-color="light" class="transition-transform duration-300 transform hover:scale-95 mb-2 inline-block rounded px-4 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #1da1f2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </button> -->

                    <!-- Whatsapp -->
                    <div class="text-slate-600 uppercase">Whatsapp Kami</div>
                    <a href="#" data-te-ripple-init data-te-ripple-color="light" class="transition-transform duration-300 transform hover:scale-95 mb-2 inline-block rounded px-4 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #128c7e">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                    </a>
                    <hr>

                </div>
            </div>

<?php
        } else {
            echo "berita tidak ditemukan.";
        }
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Parameter berita_id tidak valid.";
}

include './templates/footer.php';
?>