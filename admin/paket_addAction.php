<?php
include '../koneksi.php';

//mengambil data dari form tambah paket
$outlet = $_POST['outlet'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];

//melakukan perintah sql input data paket
mysqli_query($koneksi, "insert into tb_paket values (NULL, '$outlet','$harga','$jenis')");

//mengarahkan kehalaman paket dengan pesan berhasil menambahkan data
header("location:paket?alert=create");