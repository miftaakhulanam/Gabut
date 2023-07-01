<?php
include "../koneksi.php";

$query = query("SELECT * FROM laptop");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Document</title>
</head>
<body class="bg-slate-200">
    <header class="absolute h-full w-64 border-l-[2px] bg-white">
        <div class="py-10  border-b-[1px] border-slate-400">
            <h1 class="font-semibold pl-2">Pendataan Peminjaman Laptop</h1>
        </div>
            <nav class="">
                <ul class="">
                    <li class="py-4  "><a href="../index.php" class="pl-4">Dashboard</a></li>
                    <li class="py-4 bg-slate-200"><a href="index.php" class="pl-4">Data Laptop</a></li>
                    <li class="py-4 "><a href="../inputpeminjaman/index.php" class="pl-4">Input Peminjaman</a></li>
                    <li class="py-4 "><a href="../tambahlaptop/index.php" class="pl-4">Tambah Laptop</a></li>
                    <li class="py-4 "><a href="../reqkonfirm/index.php" class="pl-4">Menunggu Konfirmasi</a></li>
                </ul>
            </nav>
       </header>
   <section class="ml-64">
    <div class="container">
        <h1 class="py-10 border-b-[1px] ml-2  border-slate-400 ">Pages/Dashboard</h1>

        <div class="mt-4">
            <h1 class="text-xl font-semibold">Data Laptop</h1>
            <div class="bg-white rounded-md p-4 mt-2">
                <table class="text-center w-full">
                    <tr class="p-3">
                        <th class="p-3 text-sm">No</th>
                        <th class="w-32 p-3 text-sm">Jenis Laptop</th>
                        <th class="p-3 text-sm">Spesifikasi</th>
                        <th class="w-40 p-3 text-sm">Harga Sewa/hari</th>
                        <th class="w-32 p-3 text-sm">All jumlah</th>
                        <th class="w-32 p-3 text-sm">Aksi</th>
                    </tr>
                    <?php $no = 0; foreach($query as $data) : $no++;?>
                    <tr>
                        <td class="p-3 text-sm"><?= $no ?></td>
                        <td class="p-3 text-sm"><?= $data['jenis_laptop']; ?></td>
                        <td class="p-3 text-xs"><?= $data['spesifikasi']; ?></td>
                        <td class="p-3 text-sm"><?= $data['harga']; ?></td>
                        <td class="p-3 text-sm"><?= $data['jumlah']; ?></td>
                        <td class="p-3 flex gap-x-2">
                            <a href="edit.php?laptop_id=<?= $data['laptop_id']; ?>" class="inline-block py-2 px-4 bg-blue-600 text-white rounded-md text-sm">Edit</a>
                            <a href="hapus.php?laptop_id=<?= $data['laptop_id'];?>" class="inline-block py-2 px-4 bg-red-600 text-white rounded-md text-sm">Hapus</a>
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