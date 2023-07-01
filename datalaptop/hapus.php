<?php
include "../koneksi.php";
$laptop_id = $_GET['laptop_id'];

$delete = mysqli_query($koneksi, "DELETE FROM laptop WHERE laptop_id = '$laptop_id'");
if($delete){
    echo"<script> alert('berhasil di Hapus');
    document.location.href = 'index.php'</script>";
}


