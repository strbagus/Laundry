<?php
include '../koneksi.php';

//mengambil data paket_id yang akan dihapus
$id = $_GET['id'];

//melakukan perintah sql untuk menghapus data
mysqli_query($koneksi, "delete from tb_paket where paket_id='$id'");

//mengarahkan kembali ke halaman outlet
header("location:paket?alert=delete");