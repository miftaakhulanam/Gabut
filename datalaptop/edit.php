<?php
include "../koneksi.php";
$laptop_id = $_GET['laptop_id'];

$query = query ("SELECT * FROM laptop WHERE laptop_id = '$laptop_id'")[0]; 
if(isset($_POST['kirim'])){
    $jenis_laptop = htmlspecialchars($_POST['nama']);
    $spesifikasi = htmlspecialchars($_POST['spesifikasi']);
    $harga = htmlspecialchars($_POST['harga']);
    $jumlah = htmlspecialchars($_POST['jumlah']);

    $update = mysqli_query($koneksi,"UPDATE laptop SET 
                            jenis_laptop = '$jenis_laptop',
                            spesifikasi = '$spesifikasi',
                            harga = '$harga',
                            jumlah = '$jumlah' WHERE laptop_id = '$laptop_id'");

    if($update){
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
    <header class="absolute h-full w-64">
        <div class="py-10  border-b-[1px] border-slate-400">
            <h1 class="font-semibold pl-2">Pendataan Peminjaman Laptop</h1>
        </div>
            <nav class="">
                <ul class="">
                    <li class="py-4  bg-white"><a href="" class="pl-4">Dashboard</a></li>
                    <li class="py-4 "><a href="" class="pl-4">Data Laptop</a></li>
                    <li class="py-4 "><a href="" class="pl-4">Input Peminjaman</a></li>
                    <li class="py-4 "><a href="" class="pl-4">Tambah Laptop</a></li>
                    <li class="py-4 "><a href="" class="pl-4">Menunggu Konfirmasi</a></li>
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
                    <input type="text" name="nama" class="w-full mt-2 h-9 rounded-md p-2" value="<?= $query['jenis_laptop']; ?>">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="spesifikasi" class="text-lg ">Spesifikasi</label>
                    <input type="text" name="spesifikasi" class="w-full mt-2 h-9 rounded-md p-2" value="<?= $query['spesifikasi']; ?>">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="harga" class="text-lg ">Harga Sewa/hari</label>
                    <input type="number" name="harga" class="w-full mt-2 h-9 rounded-md p-2" value="<?= $query['harga']; ?>">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="jumlah" class="text-lg ">All Jumlah</label>
                    <input type="number" name="jumlah" class="w-full mt-2 h-9 rounded-md p-2" value="<?= $query['jumlah']; ?>">
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