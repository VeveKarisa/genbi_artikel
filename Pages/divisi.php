<?php
include 'navbar.php';
$result = mysqli_query($koneksi, "SELECT * FROM inti");
$pendi = mysqli_query($koneksi, "SELECT * FROM pendi");
$lh = mysqli_query($koneksi, "SELECT * FROM lh");
$kesmas = mysqli_query($koneksi, "SELECT * FROM kesmas");
$kwu = mysqli_query($koneksi, "SELECT * FROM kwu");
$kominfo = mysqli_query($koneksi, "SELECT * FROM kominfo");

// Pengecekan apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, alihkan ke halaman login
    header("Location: ../auth/login.php");
    exit();
}

?>

<div class="p-4 w-full flex flex-col gap-4">
    <h1 class="font-bold text-2xl">Divisi GenBI Komisariat Polibatam</h1>
    <div class="flex gap-2">
        <a href="divisi.php" class="bg-gray-700 hover:bg-gray-600 rounded-lg text-white w-fit px-2 py-1 text-sm lg:text-base md:text-base">Tambah Divisi</a>
        <a href="index.php" class="bg-gray-700 hover:bg-gray-600 rounded-lg text-white w-fit px-2 py-1 text-sm lg:text-base md:text-base">Tambah Artikel</a>
        <a href="berita.php" class="bg-gray-700 hover:bg-gray-600 rounded-lg text-white w-fit px-2 py-1 text-sm lg:text-base md:text-base">Tambah Berita</a>
    </div>

    <!-- ADD DIVISI -->
    <div class="lg:flex md:flex items-center gap-4">
        <button data-modal-target="add-modal" data-modal-toggle="add-modal" class="bg-red-600 hover:bg-red-500 rounded-lg text-white w-fit px-2 py-1 text-sm lg:text-base md:text-base mb-3 lg:mb-0 md:mb-0">Tambah Inti</button>
        <button data-modal-target="add-pendi" data-modal-toggle="add-pendi" class="bg-blue-900 hover:bg-blue-800 rounded-lg text-white w-fit px-2 py-1 text-sm lg:text-base md:text-base mb-3 lg:mb-0 md:mb-0">Tambah Pendidikan</button>
        <button data-modal-target="add-lh" data-modal-toggle="add-lh" class="bg-blue-500 hover:bg-blue-400 rounded-lg text-white w-fit px-2 py-1 text-sm lg:text-base md:text-base mb-3 lg:mb-0 md:mb-0">Tambah LH</button>
        <button data-modal-target="add-kesmas" data-modal-toggle="add-kesmas" class="bg-green-500 hover:bg-green-400 rounded-lg text-white w-fit px-2 py-1 text-sm lg:text-base md:text-base mb-3 lg:mb-0 md:mb-0">Tambah Kesmas</button>
        <button data-modal-target="add-kwu" data-modal-toggle="add-kwu" class="bg-pink-400 hover:bg-pink-300 rounded-lg text-white w-fit px-2 py-1 text-sm lg:text-base md:text-base mb-3 lg:mb-0 md:mb-0">Tambah KWU</button>
        <button data-modal-target="add-kominfo" data-modal-toggle="add-kominfo" class="bg-yellow-400 hover:bg-yellow-300 rounded-lg text-white w-fit px-2 py-1 text-sm lg:text-base md:text-base mb-3 lg:mb-0 md:mb-0">Tambah Kominfo</button>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <h1 class="font-bold text-xl">Inti</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-10">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="text-center px-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Divisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ketua
                    </th>
                    <th scope="col" class=" px-6 py-3">
                        Wakil
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Sekretaris 1
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Sekretaris 2
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Bendahara 1
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Bendahara 2
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $index => $row) : ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="text-center">
                            <?= $index + 1 ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['nama_divisi'] ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['ketua'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <p class=""><?= $row['wakil'] ?></p>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['sekre_satu'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['sekre_dua'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['benda_satu'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['benda_dua'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <img src="../assets/img/<?= $row['img'] ?>" alt="<?= $row['img'] ?>" class="w-64">
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button data-modal-target="edit-modal-<?= $row['inti_id'] ?>" data-modal-toggle="edit-modal-<?= $row['inti_id'] ?>" class="font-medium text-blue-600  hover:underline">Edit</button>
                            <button data-modal-target="delete-modal-<?= $row['inti_id'] ?>" data-modal-toggle="delete-modal-<?= $row['inti_id'] ?>" class="font-medium text-red-600  hover:underline">Delete</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- TAMPILAN PENDIDIKAN -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <h1 class="font-bold text-xl">Pendidikan</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-10 overflow-x-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="text-center px-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Divisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Koordinator
                    </th>
                    <th scope="col" class=" px-6 py-3">
                        Sekretaris
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bendahara
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 1
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 2
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 3
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 4
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 5
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 6
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pendi as $index => $row) : ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="text-center">
                            <?= $index + 1 ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['nama_divisi'] ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['koor'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <p class=""><?= $row['sekre'] ?></p>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['benda'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_satu'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_dua'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_tiga'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_empat'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_lima'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_enam'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <img src="../assets/img/<?= $row['img'] ?>" alt="<?= $row['img'] ?>">
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button data-modal-target="edit-pendi-<?= $row['pendi_id'] ?>" data-modal-toggle="edit-pendi-<?= $row['pendi_id'] ?>" class="font-medium text-blue-600  hover:underline">Edit</button>
                            <button data-modal-target="delete-pendi-<?= $row['pendi_id'] ?>" data-modal-toggle="delete-pendi-<?= $row['pendi_id'] ?>" class="font-medium text-red-600  hover:underline">Delete</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- TAMPILAN LH -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <h1 class="font-bold text-xl">Lingkungan Hidup</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-10 overflow-x-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="text-center px-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Divisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Koordinator
                    </th>
                    <th scope="col" class=" px-6 py-3">
                        Sekretaris
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bendahara
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 1
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 2
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 3
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 4
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 5
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 6
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 7
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lh as $index => $row) : ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="text-center">
                            <?= $index + 1 ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['nama_divisi'] ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['koor'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <p class=""><?= $row['sekre'] ?></p>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['benda'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_satu'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_dua'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_tiga'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_empat'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_lima'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_enam'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_tujuh'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <img src="../assets/img/<?= $row['img'] ?>" alt="<?= $row['img'] ?>">
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button data-modal-target="edit-lh-<?= $row['lh_id'] ?>" data-modal-toggle="edit-lh-<?= $row['lh_id'] ?>" class="font-medium text-blue-600  hover:underline">Edit</button>
                            <button data-modal-target="delete-lh-<?= $row['lh_id'] ?>" data-modal-toggle="delete-lh-<?= $row['lh_id'] ?>" class="font-medium text-red-600  hover:underline">Delete</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- TAMPILAN KESMAS -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <h1 class="font-bold text-xl">Kesehatan Masyarakat</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-10 overflow-x-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="text-center px-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Divisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Koordinator
                    </th>
                    <th scope="col" class=" px-6 py-3">
                        Sekretaris
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bendahara
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 1
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 2
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 3
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 4
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 5
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 6
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kesmas as $index => $row) : ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="text-center">
                            <?= $index + 1 ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['nama_divisi'] ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['koor'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <p class=""><?= $row['sekre'] ?></p>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['benda'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_satu'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_dua'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_tiga'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_empat'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_lima'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_enam'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <img src="../assets/img/<?= $row['img'] ?>" alt="<?= $row['img'] ?>">
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button data-modal-target="edit-kesmas-<?= $row['kesmas_id'] ?>" data-modal-toggle="edit-kesmas-<?= $row['kesmas_id'] ?>" class="font-medium text-blue-600  hover:underline">Edit</button>
                            <button data-modal-target="delete-kesmas-<?= $row['kesmas_id'] ?>" data-modal-toggle="delete-kesmas-<?= $row['kesmas_id'] ?>" class="font-medium text-red-600  hover:underline">Delete</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- TAMPILAN KWU -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <h1 class="font-bold text-xl">Kewirausahaan</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-10 overflow-x-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="text-center px-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Divisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Koordinator
                    </th>
                    <th scope="col" class=" px-6 py-3">
                        Sekretaris
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bendahara
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 1
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 2
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 3
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 4
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 5
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 6
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kwu as $index => $row) : ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="text-center">
                            <?= $index + 1 ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['nama_divisi'] ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['koor'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <p class=""><?= $row['sekre'] ?></p>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['benda'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_satu'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_dua'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_tiga'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_empat'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_lima'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_enam'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <img src="../assets/img/<?= $row['img'] ?>" alt="<?= $row['img'] ?>">
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button data-modal-target="edit-kwu-<?= $row['kwu_id'] ?>" data-modal-toggle="edit-kwu-<?= $row['kwu_id'] ?>" class="font-medium text-blue-600  hover:underline">Edit</button>
                            <button data-modal-target="delete-kwu-<?= $row['kwu_id'] ?>" data-modal-toggle="delete-kwu-<?= $row['kwu_id'] ?>" class="font-medium text-red-600  hover:underline">Delete</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- TAMPILAN KOMINFO -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h1 class="font-bold text-xl">Komunikasi & Informasi</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-10 overflow-x-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="text-center px-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Divisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Koordinator
                    </th>
                    <th scope="col" class=" px-6 py-3">
                        Sekretaris
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bendahara
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 1
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 2
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 3
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Anggota 4
                    </th>
                    <th scope="col" class="px-6 py-3 text-nowrap">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kominfo as $index => $row) : ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="text-center">
                            <?= $index + 1 ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['nama_divisi'] ?>
                        </td>
                        <td scope="row" class="px-6 py-4">
                            <?= $row['koor'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <p class=""><?= $row['sekre'] ?></p>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['benda'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_satu'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_dua'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_tiga'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['anggota_empat'] ?>
                        </td>
                        </td>
                        <td class="px-6 py-4">
                            <img src="../assets/img/<?= $row['img'] ?>" alt="<?= $row['img'] ?>">
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button data-modal-target="edit-kominfo-<?= $row['kominfo_id'] ?>" data-modal-toggle="edit-kominfo-<?= $row['kominfo_id'] ?>" class="font-medium text-blue-600  hover:underline">Edit</button>
                            <button data-modal-target="delete-kominfo-<?= $row['kominfo_id'] ?>" data-modal-toggle="delete-kominfo-<?= $row['kominfo_id'] ?>" class="font-medium text-red-600  hover:underline">Delete</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Main modal INTI -->
    <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Divisi 1
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="add-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="../crud_inti/add_inti.php" method="POST" enctype="multipart/form-data" class="overflow-y-auto">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                            <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nama Divisi" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="ketua" class="block mb-2 text-sm font-medium text-gray-900">Ketua</label>
                            <input type="text" name="ketua" id="ketua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="wakil" class="block mb-2 text-sm font-medium text-gray-900">Wakil</label>
                            <input type="text" name="wakil" id="wakil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="sekre_satu" class="block mb-2 text-sm font-medium text-gray-900">Sekre 1</label>
                            <input type="text" name="sekre_satu" id="sekre_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="sekre_dua" class="block mb-2 text-sm font-medium text-gray-900">Sekre 2</label>
                            <input type="text" name="sekre_dua" id="sekre_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="benda_satu" class="block mb-2 text-sm font-medium text-gray-900">Benda 1</label>
                            <input type="text" name="benda_satu" id="benda_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="benda_dua" class="block mb-2 text-sm font-medium text-gray-900">Benda 2</label>
                            <input type="text" name="benda_dua" id="benda_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required="">
                            <div class="review"></div>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah Divisi Inti
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($result as $index => $row) : ?>
        <!-- EDIT MODAL -->
        <div id="edit-modal-<?= $row['inti_id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Edit Divisi Inti
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-modal-<?= $row['inti_id'] ?>">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="../crud_inti/edit_inti.php" method="POST" enctype="multipart/form-data">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="text" name="inti_id" class="hidden" value="<?= $row['inti_id'] ?>">
                            <div class="col-span-2">
                                <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                                <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['nama_divisi'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="ketua" class="block mb-2 text-sm font-medium text-gray-900">Ketua</label>
                                <input type="text" name="ketua" id="ketua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['ketua'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="wakil" class="block mb-2 text-sm font-medium text-gray-900">Wakil</label>
                                <input type="text" name="wakil" id="wakil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['wakil'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="sekre_satu" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris 1</label>
                                <input type="text" name="sekre_satu" id="sekre_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['sekre_satu'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="sekre_dua" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris 2</label>
                                <input type="text" name="sekre_dua" id="sekre_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['sekre_dua'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="benda_satu" class="block mb-2 text-sm font-medium text-gray-900">Bendahara 1</label>
                                <input type="text" name="benda_satu" id="benda_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['benda_satu'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="benda_dua" class="block mb-2 text-sm font-medium text-gray-900">Bendahara 2</label>
                                <input type="text" name="benda_dua" id="benda_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['benda_dua'] ?>" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <div class="review"></div>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Edit Divisi Inti
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- DELETE MODAL -->
        <div id="delete-modal-<?= $row['inti_id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="delete-modal-<?= $row['inti_id'] ?>">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-red-600 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this <span class="text-red-600"><?= $row['nama_divisi'] ?></span></h3>
                        <div class="flex justify-center">
                            <form action="../crud_inti/delete_inti.php" method="POST" class="w-fit">
                                <input type="text" name="inti_id" id="inti_id" class="hidden" value="<?= $row['inti_id'] ?>">
                                <button data-modal-hide="delete-modal-<?= $row['inti_id'] ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Yes, I'm sure
                                </button>
                            </form>
                            <button data-modal-hide="delete-modal-<?= $row['inti_id'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>


    <!-- Main modal PENDIDIKAN -->
    <div id="add-pendi" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Divisi 2
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="add-pendi">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="../crud_pendi/add_pendi.php" method="POST" enctype="multipart/form-data" class="overflow-y-auto">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                            <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nama Divisi" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="koor" class="block mb-2 text-sm font-medium text-gray-900">Koordinator</label>
                            <input type="text" name="koor" id="koor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="sekre" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris</label>
                            <input type="text" name="sekre" id="sekre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="benda" class="block mb-2 text-sm font-medium text-gray-900">Bendahara</label>
                            <input type="text" name="benda" id="benda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_satu" class="block mb-2 text-sm font-medium text-gray-900">Anggota 1</label>
                            <input type="text" name="anggota_satu" id="anggota_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_dua" class="block mb-2 text-sm font-medium text-gray-900">Anggota 2</label>
                            <input type="text" name="anggota_dua" id="anggota_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_tiga" class="block mb-2 text-sm font-medium text-gray-900">Anggota 3</label>
                            <input type="text" name="anggota_tiga" id="anggota_tiga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_empat" class="block mb-2 text-sm font-medium text-gray-900">Anggota 4</label>
                            <input type="text" name="anggota_empat" id="anggota_empat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_lima" class="block mb-2 text-sm font-medium text-gray-900">Anggota 5</label>
                            <input type="text" name="anggota_lima" id="anggota_lima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_enam" class="block mb-2 text-sm font-medium text-gray-900">Anggota 6</label>
                            <input type="text" name="anggota_enam" id="anggota_enam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required="">
                            <div class="review"></div>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah Divisi Pendidikan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($pendi as $index => $row) : ?>
        <!-- EDIT MODAL PENDIDIKAN -->
        <div id="edit-pendi-<?= $row['pendi_id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Edit Divisi Pendidikan
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-pendi-<?= $row['pendi_id'] ?>">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="../crud_pendi/edit_pendi.php" method="POST" enctype="multipart/form-data">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="text" name="pendi_id" class="hidden" value="<?= $row['pendi_id'] ?>">
                            <div class="col-span-2">
                                <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                                <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['nama_divisi'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="koor" class="block mb-2 text-sm font-medium text-gray-900">Koordinator</label>
                                <input type="text" name="koor" id="koor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['koor'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="sekre" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris</label>
                                <input type="text" name="sekre" id="sekre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['sekre'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="benda" class="block mb-2 text-sm font-medium text-gray-900">Bendahara</label>
                                <input type="text" name="benda" id="benda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['benda'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_satu" class="block mb-2 text-sm font-medium text-gray-900">Anggota 1</label>
                                <input type="text" name="anggota_satu" id="anggota_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_satu'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_dua" class="block mb-2 text-sm font-medium text-gray-900">Anggota 2</label>
                                <input type="text" name="anggota_dua" id="anggota_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_dua'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_tiga" class="block mb-2 text-sm font-medium text-gray-900">Anggota 3</label>
                                <input type="text" name="anggota_tiga" id="anggota_tiga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_tiga'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_empat" class="block mb-2 text-sm font-medium text-gray-900">Anggota 4</label>
                                <input type="text" name="anggota_empat" id="anggota_empat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_empat'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_lima" class="block mb-2 text-sm font-medium text-gray-900">Anggota 5</label>
                                <input type="text" name="anggota_lima" id="anggota_lima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_lima'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_enam" class="block mb-2 text-sm font-medium text-gray-900">Anggota 6</label>
                                <input type="text" name="anggota_enam" id="anggota_enam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_enam'] ?>" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <div class="review"></div>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Edit Divisi Pendidikan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- DELETE MODAL -->
        <div id="delete-pendi-<?= $row['pendi_id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="delete-modal-<?= $row['pendi_id'] ?>">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-red-600 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this <span class="text-red-600"><?= $row['nama_divisi'] ?></span></h3>
                        <div class="flex justify-center">
                            <form action="../crud_pendi/delete_pendi.php" method="POST" class="w-fit">
                                <input type="text" name="pendi_id" id="pendi_id" class="hidden" value="<?= $row['pendi_id'] ?>">
                                <button data-modal-hide="delete-pendi-<?= $row['pendi_id'] ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Yes, I'm sure
                                </button>
                            </form>
                            <button data-modal-hide="delete-pendi-<?= $row['pendi_id'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- Main modal LH -->
    <div id="add-lh" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Divisi 3
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="add-lh">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="../crud_lh/add_lh.php" method="POST" enctype="multipart/form-data" class="overflow-y-auto">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                            <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nama Divisi" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="koor" class="block mb-2 text-sm font-medium text-gray-900">Koordinator</label>
                            <input type="text" name="koor" id="koor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="sekre" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris</label>
                            <input type="text" name="sekre" id="sekre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="benda" class="block mb-2 text-sm font-medium text-gray-900">Bendahara</label>
                            <input type="text" name="benda" id="benda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_satu" class="block mb-2 text-sm font-medium text-gray-900">Anggota 1</label>
                            <input type="text" name="anggota_satu" id="anggota_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_dua" class="block mb-2 text-sm font-medium text-gray-900">Anggota 2</label>
                            <input type="text" name="anggota_dua" id="anggota_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_tiga" class="block mb-2 text-sm font-medium text-gray-900">Anggota 3</label>
                            <input type="text" name="anggota_tiga" id="anggota_tiga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_empat" class="block mb-2 text-sm font-medium text-gray-900">Anggota 4</label>
                            <input type="text" name="anggota_empat" id="anggota_empat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_lima" class="block mb-2 text-sm font-medium text-gray-900">Anggota 5</label>
                            <input type="text" name="anggota_lima" id="anggota_lima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_enam" class="block mb-2 text-sm font-medium text-gray-900">Anggota 6</label>
                            <input type="text" name="anggota_enam" id="anggota_enam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_tujuh" class="block mb-2 text-sm font-medium text-gray-900">Anggota 7</label>
                            <input type="text" name="anggota_tujuh" id="anggota_tujuh" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required="">
                            <div class="review"></div>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah Divisi LH
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($lh as $index => $row) : ?>
        <!-- EDIT MODAL LH -->
        <div id="edit-lh-<?= $row['lh_id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Edit Divisi LH
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-lh-<?= $row['lh_id'] ?>">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="../crud_lh/edit_lh.php" method="POST" enctype="multipart/form-data">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="text" name="lh_id" class="hidden" value="<?= $row['lh_id'] ?>">
                            <div class="col-span-2">
                                <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                                <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['nama_divisi'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="koor" class="block mb-2 text-sm font-medium text-gray-900">Koordinator</label>
                                <input type="text" name="koor" id="koor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['koor'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="sekre" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris</label>
                                <input type="text" name="sekre" id="sekre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['sekre'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="benda" class="block mb-2 text-sm font-medium text-gray-900">Bendahara</label>
                                <input type="text" name="benda" id="benda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['benda'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_satu" class="block mb-2 text-sm font-medium text-gray-900">Anggota 1</label>
                                <input type="text" name="anggota_satu" id="anggota_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_satu'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_dua" class="block mb-2 text-sm font-medium text-gray-900">Anggota 2</label>
                                <input type="text" name="anggota_dua" id="anggota_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_dua'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_tiga" class="block mb-2 text-sm font-medium text-gray-900">Anggota 3</label>
                                <input type="text" name="anggota_tiga" id="anggota_tiga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_tiga'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_empat" class="block mb-2 text-sm font-medium text-gray-900">Anggota 4</label>
                                <input type="text" name="anggota_empat" id="anggota_empat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_empat'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_lima" class="block mb-2 text-sm font-medium text-gray-900">Anggota 5</label>
                                <input type="text" name="anggota_lima" id="anggota_lima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_lima'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_enam" class="block mb-2 text-sm font-medium text-gray-900">Anggota 6</label>
                                <input type="text" name="anggota_enam" id="anggota_enam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_enam'] ?>" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <div class="review"></div>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Edit Divisi LH
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- DELETE MODAL LH -->
        <div id="delete-lh-<?= $row['lh_id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="delete-lh-<?= $row['lh_id'] ?>">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-red-600 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this <span class="text-red-600"><?= $row['nama_divisi'] ?></span></h3>
                        <div class="flex justify-center">
                            <form action="../crud_lh/delete_lh.php" method="POST" class="w-fit">
                                <input type="text" name="lh_id" id="lh_id" class="hidden" value="<?= $row['lh_id'] ?>">
                                <button data-modal-hide="delete-modal-<?= $row['lh_id'] ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Yes, I'm sure
                                </button>
                            </form>
                            <button data-modal-hide="delete-lh-<?= $row['lh_id'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>


    <!-- Main modal KESMAS -->
    <div id="add-kesmas" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Divisi 4
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="add-kesmas">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="../crud_kesmas/add_kesmas.php" method="POST" enctype="multipart/form-data" class="overflow-y-auto">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                            <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nama Divisi" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="koor" class="block mb-2 text-sm font-medium text-gray-900">Koordinator</label>
                            <input type="text" name="koor" id="koor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="sekre" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris</label>
                            <input type="text" name="sekre" id="sekre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="benda" class="block mb-2 text-sm font-medium text-gray-900">Bendahara</label>
                            <input type="text" name="benda" id="benda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_satu" class="block mb-2 text-sm font-medium text-gray-900">Anggota 1</label>
                            <input type="text" name="anggota_satu" id="anggota_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_dua" class="block mb-2 text-sm font-medium text-gray-900">Anggota 2</label>
                            <input type="text" name="anggota_dua" id="anggota_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_tiga" class="block mb-2 text-sm font-medium text-gray-900">Anggota 3</label>
                            <input type="text" name="anggota_tiga" id="anggota_tiga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_empat" class="block mb-2 text-sm font-medium text-gray-900">Anggota 4</label>
                            <input type="text" name="anggota_empat" id="anggota_empat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_lima" class="block mb-2 text-sm font-medium text-gray-900">Anggota 5</label>
                            <input type="text" name="anggota_lima" id="anggota_lima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_enam" class="block mb-2 text-sm font-medium text-gray-900">Anggota 6</label>
                            <input type="text" name="anggota_enam" id="anggota_enam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required="">
                            <div class="review"></div>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah Divisi Kesmas
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($kesmas as $index => $row) : ?>
        <!-- EDIT MODAL KESMAS -->
        <div id="edit-kesmas-<?= $row['kesmas_id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Edit Divisi Kesmas
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-kesmas-<?= $row['kesmas_id'] ?>">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="../crud_kesmas/edit_kesmas.php" method="POST" enctype="multipart/form-data">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="text" name="kesmas_id" class="hidden" value="<?= $row['kesmas_id'] ?>">
                            <div class="col-span-2">
                                <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                                <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['nama_divisi'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="koor" class="block mb-2 text-sm font-medium text-gray-900">Koordinator</label>
                                <input type="text" name="koor" id="koor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['koor'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="sekre" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris</label>
                                <input type="text" name="sekre" id="sekre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['sekre'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="benda" class="block mb-2 text-sm font-medium text-gray-900">Bendahara</label>
                                <input type="text" name="benda" id="benda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['benda'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_satu" class="block mb-2 text-sm font-medium text-gray-900">Anggota 1</label>
                                <input type="text" name="anggota_satu" id="anggota_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_satu'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_dua" class="block mb-2 text-sm font-medium text-gray-900">Anggota 2</label>
                                <input type="text" name="anggota_dua" id="anggota_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_dua'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_tiga" class="block mb-2 text-sm font-medium text-gray-900">Anggota 3</label>
                                <input type="text" name="anggota_tiga" id="anggota_tiga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_tiga'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_empat" class="block mb-2 text-sm font-medium text-gray-900">Anggota 4</label>
                                <input type="text" name="anggota_empat" id="anggota_empat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_empat'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_lima" class="block mb-2 text-sm font-medium text-gray-900">Anggota 5</label>
                                <input type="text" name="anggota_lima" id="anggota_lima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_lima'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_enam" class="block mb-2 text-sm font-medium text-gray-900">Anggota 6</label>
                                <input type="text" name="anggota_enam" id="anggota_enam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_enam'] ?>" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <div class="review"></div>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Edit Divisi Kesmas
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- DELETE MODAL -->
        <div id="delete-kesmas-<?= $row['kesmas_id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="delete-kesmas-<?= $row['kesmas_id'] ?>">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-red-600 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this <span class="text-red-600"><?= $row['nama_divisi'] ?></span></h3>
                        <div class="flex justify-center">
                            <form action="../crud_kesmas/delete_kesmas.php" method="POST" class="w-fit">
                                <input type="text" name="kesmas_id" id="kesmas_id" class="hidden" value="<?= $row['kesmas_id'] ?>">
                                <button data-modal-hide="delete-kesmas-<?= $row['kesmas_id'] ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Yes, I'm sure
                                </button>
                            </form>
                            <button data-modal-hide="delete-kesmas-<?= $row['kesmas_id'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- Main modal KWU -->
    <div id="add-kwu" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Divisi 5
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="add-kwu">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="../crud_kwu/add_kwu.php" method="POST" enctype="multipart/form-data" class="overflow-y-auto">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                            <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nama Divisi" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="koor" class="block mb-2 text-sm font-medium text-gray-900">Koordinator</label>
                            <input type="text" name="koor" id="koor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="sekre" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris</label>
                            <input type="text" name="sekre" id="sekre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="benda" class="block mb-2 text-sm font-medium text-gray-900">Bendahara</label>
                            <input type="text" name="benda" id="benda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_satu" class="block mb-2 text-sm font-medium text-gray-900">Anggota 1</label>
                            <input type="text" name="anggota_satu" id="anggota_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_dua" class="block mb-2 text-sm font-medium text-gray-900">Anggota 2</label>
                            <input type="text" name="anggota_dua" id="anggota_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_tiga" class="block mb-2 text-sm font-medium text-gray-900">Anggota 3</label>
                            <input type="text" name="anggota_tiga" id="anggota_tiga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_empat" class="block mb-2 text-sm font-medium text-gray-900">Anggota 4</label>
                            <input type="text" name="anggota_empat" id="anggota_empat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_lima" class="block mb-2 text-sm font-medium text-gray-900">Anggota 5</label>
                            <input type="text" name="anggota_lima" id="anggota_lima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_enam" class="block mb-2 text-sm font-medium text-gray-900">Anggota 6</label>
                            <input type="text" name="anggota_enam" id="anggota_enam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required="">
                            <div class="review"></div>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah Divisi KWU
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($kwu as $index => $row) : ?>
        <!-- EDIT MODAL KWU-->
        <div id="edit-kwu-<?= $row['kwu_id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Edit Divisi KWU
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-kwu-<?= $row['kwu_id'] ?>">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="../crud_kwu/edit_kwu.php" method="POST" enctype="multipart/form-data">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="text" name="kwu_id" class="hidden" value="<?= $row['kwu_id'] ?>">
                            <div class="col-span-2">
                                <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                                <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['nama_divisi'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="koor" class="block mb-2 text-sm font-medium text-gray-900">Koordinator</label>
                                <input type="text" name="koor" id="koor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['koor'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="sekre" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris</label>
                                <input type="text" name="sekre" id="sekre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['sekre'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="benda" class="block mb-2 text-sm font-medium text-gray-900">Bendahara</label>
                                <input type="text" name="benda" id="benda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['benda'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_satu" class="block mb-2 text-sm font-medium text-gray-900">Anggota 1</label>
                                <input type="text" name="anggota_satu" id="anggota_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_satu'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_dua" class="block mb-2 text-sm font-medium text-gray-900">Anggota 2</label>
                                <input type="text" name="anggota_dua" id="anggota_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_dua'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_tiga" class="block mb-2 text-sm font-medium text-gray-900">Anggota 3</label>
                                <input type="text" name="anggota_tiga" id="anggota_tiga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_tiga'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_empat" class="block mb-2 text-sm font-medium text-gray-900">Anggota 4</label>
                                <input type="text" name="anggota_empat" id="anggota_empat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_empat'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_lima" class="block mb-2 text-sm font-medium text-gray-900">Anggota 5</label>
                                <input type="text" name="anggota_lima" id="anggota_lima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_lima'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_enam" class="block mb-2 text-sm font-medium text-gray-900">Anggota 6</label>
                                <input type="text" name="anggota_enam" id="anggota_enam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_enam'] ?>" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <div class="review"></div>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Edit Divisi KWU
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- DELETE MODAL -->
        <div id="delete-kwu-<?= $row['kwu_id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="delete-kwu-<?= $row['kwu_id'] ?>">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-red-600 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this <span class="text-red-600"><?= $row['nama_divisi'] ?></span></h3>
                        <div class="flex justify-center">
                            <form action="../crud_kwu/delete_kwu.php" method="POST" class="w-fit">
                                <input type="text" name="kwu_id" id="kwu_id" class="hidden" value="<?= $row['kwu_id'] ?>">
                                <button data-modal-hide="delete-kwu-<?= $row['kwu_id'] ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Yes, I'm sure
                                </button>
                            </form>
                            <button data-modal-hide="delete-kwu-<?= $row['kwu_id'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- Main modal KOMINFO -->
    <div id="add-kominfo" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Divisi 6
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="add-kominfo">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="../crud_kominfo/add_kominfo.php" method="POST" enctype="multipart/form-data" class="overflow-y-auto">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                            <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nama Divisi" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="koor" class="block mb-2 text-sm font-medium text-gray-900">Koordinator</label>
                            <input type="text" name="koor" id="koor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="sekre" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris</label>
                            <input type="text" name="sekre" id="sekre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="benda" class="block mb-2 text-sm font-medium text-gray-900">Bendahara</label>
                            <input type="text" name="benda" id="benda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_satu" class="block mb-2 text-sm font-medium text-gray-900">Anggota 1</label>
                            <input type="text" name="anggota_satu" id="anggota_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_dua" class="block mb-2 text-sm font-medium text-gray-900">Anggota 2</label>
                            <input type="text" name="anggota_dua" id="anggota_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_tiga" class="block mb-2 text-sm font-medium text-gray-900">Anggota 3</label>
                            <input type="text" name="anggota_tiga" id="anggota_tiga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="anggota_empat" class="block mb-2 text-sm font-medium text-gray-900">Anggota 4</label>
                            <input type="text" name="anggota_empat" id="anggota_empat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required="">
                            <div class="review"></div>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah Divisi Kominfo
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($kominfo as $index => $row) : ?>
        <!-- EDIT MODAL KOMINFO-->
        <div id="edit-kominfo-<?= $row['kominfo_id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Edit Divisi Kominfo
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-kominfo-<?= $row['kominfo_id'] ?>">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="../crud_kominfo/edit_kominfo.php" method="POST" enctype="multipart/form-data">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="text" name="kominfo_id" class="hidden" value="<?= $row['kominfo_id'] ?>">
                            <div class="col-span-2">
                                <label for="nama_divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                                <input type="text" name="nama_divisi" id="nama_divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['nama_divisi'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="koor" class="block mb-2 text-sm font-medium text-gray-900">Koordinator</label>
                                <input type="text" name="koor" id="koor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['koor'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="sekre" class="block mb-2 text-sm font-medium text-gray-900">Sekretaris</label>
                                <input type="text" name="sekre" id="sekre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['sekre'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="benda" class="block mb-2 text-sm font-medium text-gray-900">Bendahara</label>
                                <input type="text" name="benda" id="benda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['benda'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_satu" class="block mb-2 text-sm font-medium text-gray-900">Anggota 1</label>
                                <input type="text" name="anggota_satu" id="anggota_satu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_satu'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_dua" class="block mb-2 text-sm font-medium text-gray-900">Anggota 2</label>
                                <input type="text" name="anggota_dua" id="anggota_dua" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_dua'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_tiga" class="block mb-2 text-sm font-medium text-gray-900">Anggota 3</label>
                                <input type="text" name="anggota_tiga" id="anggota_tiga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_tiga'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="anggota_empat" class="block mb-2 text-sm font-medium text-gray-900">Anggota 4</label>
                                <input type="text" name="anggota_empat" id="anggota_empat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['anggota_empat'] ?>" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <div class="review"></div>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Edit Divisi Kominfo
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- DELETE MODAL -->
        <div id="delete-kominfo-<?= $row['kominfo_id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="delete-kominfo-<?= $row['kominfo_id'] ?>">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-red-600 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this <span class="text-red-600"><?= $row['nama_divisi'] ?></span></h3>
                        <div class="flex justify-center">
                            <form action="../crud_kominfo/delete_kominfo.php" method="POST" class="w-fit">
                                <input type="text" name="kominfo_id" id="kominfo_id" class="hidden" value="<?= $row['kominfo_id'] ?>">
                                <button data-modal-hide="delete-kominfo-<?= $row['kominfo_id'] ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Yes, I'm sure
                                </button>
                            </form>
                            <button data-modal-hide="delete-kominfo-<?= $row['kominfo_id'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</div>
<?php include 'footer.php' ?>