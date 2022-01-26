<?php
include '../koneksi.php';

//mengambil data dari form user
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$outlet = $_POST['outlet'];

//membuat eksekusi sql untuk memasukan data kedalam database
$adduser="insert into tb_user values
(NULL,'$username','$password','$nama','$level','$outlet')";
mysqli_query($koneksi, $adduser);

//mengarahkan halaman setelah melakukan perintah sql
header("location:user?alert=create");