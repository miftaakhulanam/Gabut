<?php
include "koneksi.php";
$peminjaman_id = $_GET['peminjaman_id'];
$pesanan = $_GET['pesanan'];
$jumlah = $_GET['jumlah'];
$insert = mysqli_query($koneksi,"SELECT jumlah_pesanan,jumlah FROM peminjaman INNER JOIN laptop ON laptop.laptop_id = peminjaman.laptop_id WHERE peminjaman_id = '$peminjaman_id'");

$count = $pesanan + $jumlah;
$update = mysqli_query($koneksi, "UPDATE peminjaman INNER JOIN laptop ON laptop.laptop_id = peminjaman.laptop_id
                                   SET status = 'selesai dipinjam',
                                        jumlah = '$count' WHERE peminjaman_id = '$peminjaman_id'");
if($update){
    echo"<script> alert('Laptop Selesai di pinjam');
    document.location.href = 'index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="hidden" name="pesanan" value="<?= $insert['jumlah_pesanan']; ?>">
        <input type="hidden" name="stock" value="<?= $insert['jumlah']; ?>">
    </form>
</body>
</html>