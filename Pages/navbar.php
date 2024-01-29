<?php
include '../templates/header.php';
session_start();
require('../koneksi.php');

// Pengecekan apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, alihkan ke halaman login
    header("Location: ../auth/login.php");
    exit();
}

?>

<nav class="bg-gradient-to-r from-blue-600 to-blue-800  w-full text-white p-4 flex items-center justify-between lg:justify-normal">
    <div class="flex items-center gap-5">
        <img src="../assets/img/Genbi komsat batam bulat.png" alt="logo" class="w-10">
        <h1 class="lg:flex hidden">Genbi Komisariat Polibatam</h1>
    </div>

    <!-- Tambahkan elemen SVG untuk ikon menu -->
    <button id="menuToggle" class="lg:hidden md:hidden focus:outline-none">
        <svg id="menuIcon" class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>

    <!-- Sidebar untuk layar kecil -->
    <div id="sidebar" class="fixed top-20 right-10 bg-white hidden lg:hidden md:hidden z-50 shadow-xl rounded">
        <!-- Daftar menu sidebar -->
        <ul class="text-white">
            <li><a href="index.php" class="block px-4 py-2 text-black" target="_blank">Beranda</a></li>
            <li><a href="artikel.php" class="block px-4 py-2 text-black" target="_blank">Artikel</a></li>
            <li><a href="berita.php" class="block px-4 py-2 text-black" target="_blank">Berita</a></li>
            <li><a href="inti.php" class="block px-4 py-2 text-black" target="_blank">Inti</a></li>
            <li><a href="pendidikan.php" class="block px-4 py-2 text-black" target="_blank">Pendidikan</a></li>
            <li><a href="lh.php" class="block px-4 py-2 text-black" target="_blank">Lingkungan Hidup</a></li>
            <li><a href="kesmas.php" class="block px-4 py-2 text-black" target="_blank">Kesehatan Masyarakat</a></li>
            <li><a href="kwu.php" class="block px-4 py-2 text-black" target="_blank">Kewirausahaan</a></li>
            <li><a href="kominfo.php" class="block px-4 py-2 text-black" target="_blank">Komunikasi & Informasi</a></li>
            <li class="block px-4 py-2 text-black">
                <?php if ($_SESSION == null) : ?>
                    <a href="auth/login.php">Masuk</a>
                <?php else : ?>
                    <a href="/auth/logout.php">Keluar</a>
                <?php endif ?>
            </li>
        </ul>
    </div>

    <div class="lg:flex-grow md:flex-grow hidden lg:flex md:flex justify-center">
        <ul class="flex gap-6">
            <li><a href="index.php" class="hover:text-slate-300">Beranda</a></li>
            <li><a href="artikel.php" class="hover:text-slate-300">Artikel</a></li>
            <li><a href="berita.php" class="hover:text-slate-300">Berita</a></li>
            <li class="group">
                <button id="driveDropdownHoverButton" data-dropdown-toggle="driveDropdownHover" class="flex items-center text-base hover:text-slate-300" type="button">
                    Divisi
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="driveDropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="driveDropdownHoverButton">
                        <li><a href="inti.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" target="_blank">Inti</a></li>
                        <li><a href="pendidikan.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" target="_blank">Pendidikan</a></li>
                        <li><a href="lh.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" target="_blank">Lingkungan Hidup</a></li>
                        <li><a href="kesmas.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" target="_blank">Kesehatan Masyarakat</a></li>
                        <li><a href="kwu.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" target="_blank">Kewirausahaan</a></li>
                        <li><a href="kominfo.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" target="_blank">Komunikasi & Informasi</a></li>
                    </ul>
                </div>
            </li>
            <?php if ($_SESSION != null) : ?>
                <li><a href="Pages/" class="hover:text-slate-300">Halaman Admin</a></li>
            <?php endif ?>
        </ul>
    </div>

    <div class="lg:flex md:flex hidden">
        <?php if ($_SESSION == null) : ?>
            <a href="../auth/login.php">Masuk</a>
        <?php else : ?>
            <a href="../auth/logout.php">Keluar</a>
        <?php endif ?>
    </div>
</nav>

<script>
    // Tambahkan event listener untuk scroll
    window.addEventListener('scroll', function() {
        var sidebar = document.getElementById('sidebar');
        var menuIcon = document.getElementById('menuIcon');

        // Periksa apakah sidebar terbuka dan jika iya, tutup
        if (!sidebar.classList.contains('hidden')) {
            closeSidebar();
        }
    });

    document.getElementById('menuToggle').addEventListener('click', function() {
        toggleSidebar();
    });

    document.addEventListener('click', function(event) {
        var sidebar = document.getElementById('sidebar');
        var menuToggle = document.getElementById('menuToggle');

        // Periksa apakah yang diklik berada di luar sidebar dan tombol toggle
        if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
            closeSidebar();
        }
    });

    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var menuIcon = document.getElementById('menuIcon');
        sidebar.classList.toggle('hidden');

        // Ganti ikon berdasarkan keadaan sidebar
        if (sidebar.classList.contains('hidden')) {
            menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>';
        } else {
            menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
        }
    }

    function closeSidebar() {
        var sidebar = document.getElementById('sidebar');
        var menuIcon = document.getElementById('menuIcon');
        sidebar.classList.add('hidden');
        menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>';
    }
</script>