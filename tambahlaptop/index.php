<?php
include "../koneksi.php";

if(isset($_POST['kirim'])){
    $jenis_laptop = htmlspecialchars($_POST['nama']);
    $spesifikasi = htmlspecialchars($_POST['spesifikasi']);
    $harga = htmlspecialchars($_POST['harga']);
    $jumlah = htmlspecialchars($_POST['jumlah']);

    $insert = mysqli_query($koneksi,"INSERT INTO laptop(jenis_laptop,spesifikasi,harga,jumlah) VALUES('$jenis_laptop','$spesifikasi','$harga','$jumlah')");

    if($insert){
        echo"<script> alert('berhasil di simpan');
        document.location.href = '../datalaptop/index.php'</script>";
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
                    <li class="py-4 bg-slate-200"><a href="index.php" class="pl-4">Tambah Laptop</a></li>
                    <li class="py-4 "><a href="../reqkonfirm/index.php" class="pl-4">Menunggu Konfirmasi</a></li>
                </ul>
            </nav>
       </header>
   <section class="ml-64">
    <div class="container">
        <h1 class="py-10 border-b-[1px] ml-2  border-slate-400 ">Pages/Dashboard</h1>

        <div class="mt-4">
            <h1 class="text-xl font-semibold text-center">Tambah Laptop</h1>
            <form action="" class="mt-4 " method="POST">
                <div class="w-[80%] mx-auto">
                    <label for="nama" class="text-lg ">Jenis Laptop</label>
                    <input type="text" name="nama" class="w-full mt-2 h-9 rounded-md p-2">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="spesifikasi" class="text-lg ">Spesifikasi</label>
                    <input type="text" name="spesifikasi" class="w-full mt-2 h-9 rounded-md p-2">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="harga" class="text-lg ">Harga Sewa/hari</label>
                    <input type="number" name="harga" class="w-full mt-2 h-9 rounded-md p-2">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="jumlah" class="text-lg ">All Jumlah</label>
                    <input type="number" name="jumlah" class="w-full mt-2 h-9 rounded-md p-2">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <button name="kirim" class="py-2 px-4 bg-blue-600 text-white rounded-md">Kirim</button>
                </div>
            </form>

        </div>
        
    </div>
   </section>

</body>
</html>