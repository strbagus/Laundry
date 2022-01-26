<?php
include '../koneksi.php';

//mengambil data outlet_id yang akan dihapus
$id = $_GET['id'];

//melakukan perintah sql untuk menghapus data
mysqli_query($koneksi, "delete from tb_outlet where outlet_id='$id'");

//mengarahkan kembali ke halaman outlet
header("location:outlet?alert=delete");