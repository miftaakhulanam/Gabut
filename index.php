<?php
include "koneksi.php";

$peminjaman = mysqli_query($koneksi,"SELECT * FROM peminjaman JOIN laptop ON laptop.laptop_id = peminjaman.laptop_id WHERE status = 'sedang di pinjam'");

$stock = query("SELECT * FROM laptop WHERE jumlah > 0");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Document</title>
</head>
<body class="bg-slate-200">
    <header class="absolute h-full w-64 border-l-[2px] bg-white">
        <div class="py-10  border-b-[1px] border-slate-400">
            <h1 class="font-semibold pl-2">Pendataan Peminjaman Laptop</h1>
        </div>
            <nav class="">
                <ul class="">
                    <li class="py-4  bg-slate-200"><a href="index.php" class="pl-4">Dashboard</a></li>
                    <li class="py-4 "><a href="datalaptop/index.php" class="pl-4">Data Laptop</a></li>
                    <li class="py-4 "><a href="inputpeminjaman/index.php" class="pl-4">Input Peminjaman</a></li>
                    <li class="py-4 "><a href="tambahlaptop/index.php" class="pl-4">Tambah Laptop</a></li>
                    <li class="py-4 "><a href="reqkonfirm/index.php" class="pl-4">Menunggu Konfirmasi</a></li>
                </ul>
            </nav>
       </header>
   <section class="ml-64">
    <div class="container">
        <h1 class="py-10 border-b-[1px] ml-2  border-slate-400 ">Pages/Dashboard</h1>
        <div class="mt-4">
            <h1 class="text-xl font-semibold">Stock Laptop</h1>
            <div class="bg-white rounded-md p-4 mt-2">
                <table class="text-center w-full">
                    <tr class="P-3">
                        <th class="P-3 text-sm">No</th>
                        <th class="w-32 P-3 text-sm">Jenis Laptop</th>
                        <th class="P-3 text-sm">Spesifikasi</th>
                        <th class="w-32 P-3 text-sm">Stock Ready</th>
                        <th class="w-40 p-3 text-sm">Harga Sewa/hari</th>
                    </tr>
                    <?php $no = 0; foreach($stock as $query) : $no++?>
                    <tr class="P-3">
                        <td class="p-3 text-sm"><?= $no;?></td>
                        <td class="p-3 text-sm"><?= $query['jenis_laptop']; ?></td>
                        <td class=" P-3 text-xs"><?= $query['spesifikasi']; ?></td>
                        <td class="p-3 text-sm"><?= $query['jumlah']; ?></td>
                        <td class="p-3 text-sm"><?= $query['harga'];?></td>
                   </tr>
                    <?php endforeach;?>
                </table>
            </div>



            <h1 class="text-xl font-semibold mt-8">Sedang Dipinjam</h1>
            <div class="bg-white rounded-md p-4 mt-2">
                <table class="text-center w-full">
                    <tr class="P-3">
                        <th class="P-3 text-sm">No</th>
                        <th class=" P-3 text-sm">Jenis Laptop</th>
                        <th class="P-3 text-sm">Spesifikasi</th>
                        <th class=" P-3 text-sm">Nama</th>
                        <th class=" P-3 text-sm">Jumlah</th>
                        <th class=" p-3 text-sm">Tgl-Dipinjam</th>
                        <th class=" P-3 text-sm">Tgl-Selesai</th>
                        <th class=" P-3 text-sm">Total Harga</th>
                        <th class=" P-3 text-sm">Aksi</th>
                    </tr>
                    <?php $no = 0 ; foreach($peminjaman as $query) : $no++;?>
                    <tr class="P-3">
                        <td class="p-3 text-sm"><?= $no; ?></td>
                        <td class="p-3 text-sm"><?= $query['jenis_laptop']; ?></td>
                        <td class=" P-3 text-xs w-80"><?= $query['spesifikasi']; ?></td>
                        <td class="p-3 text-sm"><?= $query['nama']; ?></td>
                        <td class="p-3 text-sm"><?= $query['jumlah_peminjaman']; ?></td>
                        <td class="p-3 text-sm"><?= $query['tgl_dipesan']; ?></td>
                        <td class="p-3 text-sm"><?= $query['tgl_selesai']; ?></td>
                        <td class="p-3 text-sm"><?= $query['total']; ?></td>
                        <td class="p-3 flex justify-center m-auto">
                            <a href="selesai_pinjam.php?peminjaman_id=<?= $query['peminjaman_id']; ?>&pesanan=<?= $query['jumlah_peminjaman']; ?>&jumlah=<?= $query['jumlah']; ?>" class="inline-block py-2 px-4 bg-green-600 text-white rounded-md text-sm">Selesai</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>  

        </div>
        
    </div>
   </section>

</body>
</html>