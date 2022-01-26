<?php
include '../koneksi.php';

//mengambil data pelanggan_id yang akan dihapus
$id = $_GET['id'];

//melakukan perintah sql untuk menghapus data
mysqli_query($koneksi, "delete from tb_pelanggan where pelanggan_id='$id'");

//mengarahkan kembali ke halaman pelanggan
header("location:pelanggan?alert=delete");