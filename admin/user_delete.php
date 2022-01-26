<?php
include '../koneksi.php';

//mengambil data user_id yang akan dihapus
$id = $_GET['id'];

//melakukan perintah sql untuk menghapus data
mysqli_query($koneksi, "delete from tb_user where user_id='$id'");

//mengarahkan kembali ke halaman user
header("location:user?alert=delete");