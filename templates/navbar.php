<?php
include 'header.php';
session_start();
require('koneksi.php');
?>

<nav class="bg-gradient-to-r from-blue-600 to-blue-800  w-full text-white p-4 flex justify-between items-center">
    <div class="flex items-center gap-5">
        <img src="assets/img/Genbi komsat batam bulat.png" alt="logo" class="w-10">
        <h1>Genbi Komisariat Polibatam</h1>
    </div>
    <div>
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
                        <!-- <li>
                            <button id="imsDropdownHoverButton" data-dropdown-toggle="imsDropdownHover" data-dropdown-trigger="hover" data-dropdown-placement="right-end" class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full text-left" type="button">
                                TES
                                <svg class="w-2.5 h-2.5 ms-3 -rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                          
                            <div id="imsDropdownHover" class="z-2o hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="imsDropdownHoverButton">
                                    <li><a href="https://sites.google.com/cladtek.com/brasil/p%C3%A1gina-inicial" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" target="_blank">Portal TES</a></li>
                                    <li><a href="https://drive.google.com/drive/folders/1NP0J9iZeLXpZSHKlGB2hfqmoehcjhlBd" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" target="_blank">TES</a></li>
                                    <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSe438u3iggr5KbSsBHIoj3JM1alBvAc8wwkq_nEFYwREKLUMA/viewform?usp=pp_url" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" target="_blank">TES</a></li>
                                </ul>
                            </div>
                        </li> -->
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
    <div>
        <?php if ($_SESSION == null) : ?>
            <a href="auth/login.php">Masuk</a>
        <?php else : ?>
            <a href="auth/logout.php">Keluar</a>
        <?php endif ?>
    </div>
</nav>