<?php
include 'navbar.php';
$result = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal_upload DESC LIMIT 7");
?>

<div class="p-4 w-full flex flex-col gap-4">
    <h1 class="font-bold text-2xl">List Berita</h1>
    <div class="flex gap-2">
        <button data-modal-target="add-modal" data-modal-toggle="add-modal" class="bg-gray-700 hover:bg-gray-600 rounded-lg text-white w-fit px-2 py-1">Tambah Berita</button>
        <a href="index.php" class="bg-gray-700 hover:bg-gray-600 rounded-lg text-white w-fit px-2 py-1">Tambah Artikel</a>
        <a href="divisi.php" class="bg-gray-700 hover:bg-gray-600 rounded-lg text-white w-fit px-2 py-1">Tambah Divisi</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="text-center px-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul Berita
                    </th>
                    <th scope="col" class=" px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penulis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Upload
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
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            <?= $row['judul'] ?>
                        </th>
                        <td class="px-6 py-4 text-justify">
                            <p class=""><?= $row['description'] ?></p>
                        </td>
                        <td class="px-6 py-4">
                            <img src="../assets/img/<?= $row['img'] ?>" alt="<?= $row['img'] ?>" class="w-96">
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['penulis'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['tanggal_upload'] ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button data-modal-target="edit-modal-<?= $row['berita_id'] ?>" data-modal-toggle="edit-modal-<?= $row['berita_id'] ?>" class="font-medium text-blue-600  hover:underline">Edit</button>
                            <button data-modal-target="delete-modal-<?= $row['berita_id'] ?>" data-modal-toggle="delete-modal-<?= $row['berita_id'] ?>" class="font-medium text-red-600  hover:underline">Delete</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Main modal -->
    <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Tambah Berita
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="add-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="../crud_berita/add_berita.php" method="POST" enctype="multipart/form-data">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul Berita</label>
                            <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Isi Judul Berita" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900">Penulis</label>
                            <input type="text" name="penulis" id="penulis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Isi Nama Penulis" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tanggal_upload" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Upload</label>
                            <input type="date" name="tanggal_upload" id="tanggal_upload" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="99" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required="">
                            <div class="review"></div>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis Deskripsi Berita"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah Berita
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($result as $index => $row) : ?>
        <!-- EDIT MODAL -->
        <div id="edit-modal-<?= $row['berita_id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Edit Berita
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-modal-<?= $row['berita_id'] ?>">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="../crud_berita/edit_berita.php" method="POST" enctype="multipart/form-data">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="text" name="berita_id" class="hidden" value="<?= $row['berita_id'] ?>">
                            <div class="col-span-2">
                                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                                <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['judul'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900">Penulis</label>
                                <input type="text" name="penulis" id="penulis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['penulis'] ?>" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="tanggal_upload" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Edit</label>
                                <input type="date" name="tanggal_upload" id="tanggal_upload" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?= $row['tanggal_upload'] ?>" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                                <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <div class="review"></div>
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"><?= $row['description'] ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Edit Berita
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- DELETE MODAL -->
        <div id="delete-modal-<?= $row['berita_id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="delete-modal-<?= $row['berita_id'] ?>">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-red-600 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this <span class="text-red-600"><?= $row['judul'] ?></span> Berita?</h3>
                        <div class="flex justify-center">
                            <form action="../crud_berita/delete_berita.php" method="POST" class="w-fit">
                                <input type="text" name="berita_id" id="berita_id" class="hidden" value="<?= $row['berita_id'] ?>">
                                <button data-modal-hide="delete-modal-<?= $row['berita_id'] ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Yes, I'm sure
                                </button>
                            </form>
                            <button data-modal-hide="delete-modal-<?= $row['berita_id'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>


</div>
<?php include 'footer.php' ?>