<?php
include "../koneksi.php";

$laptop = query("SELECT laptop_id,jenis_laptop,harga,jumlah FROM laptop WHERE jumlah > 0");
if(isset($_POST['kirim'])){
    $jenis = htmlspecialchars($_POST['jenis']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_tlpn = htmlspecialchars($_POST['no_tlpn']);
    $nama = htmlspecialchars($_POST['nama']);
    $tgl_in = htmlspecialchars($_POST['tgl_dipesan']);
    $tgl_done = htmlspecialchars($_POST['tgl_selesai']);
    $total = htmlspecialchars($_POST['total']);
    $jmlh_pesanan = htmlspecialchars($_POST['jumlah']);
    $validasi = query("SELECT jumlah FROM laptop WHERE laptop_id = '$jenis'");

    if($validasi >= $jmlh_pesanan){
        $insert = mysqli_query($koneksi, "INSERT INTO peminjaman(laptop_id,alamat,nomor_tlp,nama,jumlah_peminjaman,tgl_dipesan,tgl_selesai,total,status) VALUES('$jenis','$alamat','$no_tlpn','$nama','$jmlh_pesanan','$tgl_in','$tgl_done','$total','menunggu konfirmasi')");

        if($insert){
            $jenis = htmlspecialchars($_POST['jenis']);
            $stock_laptop = $_POST['stock'];
            $jmlh_pesanan = htmlspecialchars($_POST['jumlah']);
            $count = $jmlh_pesanan -  $stock_laptop ;
    
            $update = mysqli_query($koneksi, "UPDATE laptop SET
                                        jumlah = '$count' WHERE laptop_id = '$jenis'");
            if($update){
                echo"<script> alert('berhasil di simpan');
                document.location.href = '../index.php'</script>";
            }
        }
    }else if($validasi < $jmlh_pesanan){
        echo"<script> alert('Mohon Maaf Pemesanan Gagal,Pemesanan melebihi stock');
        document.location.href = '../index.php'</script>";
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
    <header class="fixed h-full w-64 bg-white">
        <div class="py-10  border-b-[1px] border-slate-400">
            <h1 class="font-semibold pl-2">Pendataan Peminjaman Laptop</h1>
        </div>
            <nav class="">
                <ul class="">
                    <li class="py-4"><a href="../index.php" class="pl-4">Dashboard</a></li>
                    <li class="py-4 "><a href="../datalaptop/index.php" class="pl-4">Data Laptop</a></li>
                    <li class="py-4 bg-slate-200"><a href="index.php" class="pl-4">Input Peminjaman</a></li>
                    <li class="py-4 "><a href="../tambahlaptop/index.php" class="pl-4">Tambah Laptop</a></li>
                    <li class="py-4 "><a href="../reqkonfirm/index.php" class="pl-4">Menunggu Konfirmasi</a></li>
                </ul>
            </nav>
       </header>
   <section class="ml-64">
    <div class="container">
        <h1 class="py-10 border-b-[1px] ml-2  border-slate-400 ">Pages/Dashboard</h1>

        <div class="mt-4">
            <h1 class="text-xl font-semibold text-center">Input Peminjaman</h1>
            <form action="" class="mt-4 " method="POST">
                <input type="hidden" name="stock" value="<?= $laptop['jumlah'];?>">
                <div class="w-[80%] mx-auto">
                    <label for="jenis" class="text-lg ">Jenis laptop</label>
                    <select name="jenis" id="" class="w-full h-9 mt-2 rounded-md p-2">
                    <?php foreach($laptop as $laptop): ?>
                        <option value="<?= $laptop['laptop_id'];?>"><?= $laptop["jenis_laptop"]; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="alamat" class="text-lg ">Alamat</label>
                    <input type="text" name="alamat" class="w-full mt-2 h-9 rounded-md p-2">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="no_tlpn" class="text-lg ">Nomor Telphone</label>
                    <input type="number" name="no_tlpn" class="w-full mt-2 h-9 rounded-md p-2">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="nama" class="text-lg ">Nama</label>
                    <input type="text" name="nama" class="w-full mt-2 h-9 rounded-md p-2">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="jumlah" class="text-lg ">Jumlah</label>
                    <input type="number" name="jumlah" min="1" max="" class="w-full mt-2 h-9 rounded-md p-2">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="tgl_dipesan" class="text-lg ">Tgl Dipesan</label>
                    <input type="date" name="tgl_dipesan" class="w-full mt-2 h-9 rounded-md p-2">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="tgl_selesai" class="text-lg ">Tgl Selesai</label>
                    <input type="date" name="tgl_selesai" class="w-full mt-2 h-9 rounded-md p-2">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="total" class="text-lg ">Total Harga</label>
                    <input type="number" name="total" class="w-full mt-2 h-9 rounded-md p-2">
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