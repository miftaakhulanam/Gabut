<?php
include "../koneksi.php";

$query = mysqli_query($koneksi,"SELECT * FROM peminjaman JOIN laptop ON laptop.laptop_id = peminjaman.laptop_id WHERE status = 'menunggu konfirmasi'");



 
if(isset($_POST['konfirmasi'])){
    $peminjaman_id = $_POST['pemesanan_id'];
    $update = mysqli_query($koneksi,"UPDATE peminjaman SET status = 'sedang di pinjam' WHERE peminjaman_id = '$peminjaman_id'");
    if($update){
        echo"<script> alert('berhasil di simpan');
        document.location.href = 'index.php'</script>";
    }
}
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
    <header class="absolute h-full w-64 bg-white">
        <div class="py-10  border-b-[1px] border-slate-400">
            <h1 class="font-semibold pl-2">Pendataan Peminjaman Laptop</h1>
        </div>
            <nav class="">
                <ul class="">
                    <li class="py-4 "><a href="../index.php" class="pl-4">Dashboard</a></li>
                    <li class="py-4 "><a href="../datalaptop/index.php" class="pl-4">Data Laptop</a></li>
                    <li class="py-4 "><a href="../inputpeminjaman/index.php" class="pl-4">Input Peminjaman</a></li>
                    <li class="py-4 "><a href="../tambahlaptop/index.php" class="pl-4">Tambah Laptop</a></li>
                    <li class="py-4 bg-slate-200"><a href="index.php" class="pl-4">Menunggu Konfirmasi</a></li>
                </ul>
            </nav>
       </header>
   <section class="ml-64">
    <div class="container">
        <h1 class="py-10 border-b-[1px] ml-2  border-slate-400 ">Pages/Dashboard</h1>
        <div class="mt-4">
            <h1 class="text-xl font-semibold">Menunggu Konfirmasi</h1>
            <div class="bg-white rounded-md p-4 mt-2">
                <table class="text-center w-full ">
                    <thead>
                    <tr class="p-2">
                        <th class="p-2 text-sm">No</th>
                        <th class="p-2 text-sm">Nama Peminjam</th>
                        <th class="p-2 text-sm">No Telphone</th>
                        <th class="p-2 text-sm">Jenis Laptop</th>
                        <th class="p-2 text-sm">Jumlah Dipinjam</th>
                        <th class="p-2 text-sm">Tanggal Dipinjam</th>
                        <th class="p-2 text-sm">Tanggal Selesai</th>
                        <th class="p-2 text-sm">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no = 0; foreach($query as $data) : $no++ ;?>

                    <tr class="border-b-[2px] p-3">
                        <td class="p-3 text-sm"></td>
                        <td class="p-3 text-sm"><?= $data['nama']; ?></td>
                        <td class="p-3 text-sm"><?= $data['nomor_tlp']; ?></td>
                        <td class="p-3 text-sm"><?= $data['jenis_laptop']; ?></td>
                        <td class="p-3 text-sm"><?= $data['jumlah_peminjaman']; ?></td>
                        <td class="p-3 text-sm"><?= $data['tgl_dipesan']; ?></td>
                        <td class="p-3 text-sm"><?= $data['tgl_selesai']; ?></td>
                        <td class="p-3 flex gap-x-2">
                        <form action="" method="POST">
                            <input type="hidden" name="pemesanan_id" value="<?= $data['peminjaman_id'];?>">
                            <button name="konfirmasi" class="inline-block py-2 px-4 bg-green-600 text-white rounded-md text-sm">Konfirmasi</button>
                        </form>
                            <a href="batal.php?peminjaman_id=<?= $data['peminjaman_id'];?>" class="inline-block py-2 px-4 bg-red-600 text-white rounded-md text-sm">Batal</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
                </table>
            </div>

        </div>
        
    </div>
   </section>

</body>
</html>