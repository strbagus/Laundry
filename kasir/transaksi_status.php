<?php

$id = $_GET['id'];
include '../koneksi.php';

$data = mysqli_query($koneksi,"SELECT * FROM tb_transaksi WHERE transaksi_id='$id'");
$d = mysqli_fetch_array($data);
   
 if($d['transaksi_status']=="selesai"){
    $status = "diambil";
    mysqli_query($koneksi, "update tb_transaksi set transaksi_bayar='lunas' where transaksi_id='$id'");
}else if($d['transaksi_status']=="proses"){
    $status = "selesai";
}

mysqli_query($koneksi, "update tb_transaksi set transaksi_status='$status' where transaksi_id='$id'");

header("location:transaksi?alert=update");


?>