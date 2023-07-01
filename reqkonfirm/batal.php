<?php
include "../koneksi.php";
$peminjaman_id = $_GET['peminjaman_id'];

$delete = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE peminjaman_id = '$peminjaman_id'");
if($delete){
    echo"<script> alert('berhasil di Hapus');
    document.location.href = 'index.php'</script>";
}


