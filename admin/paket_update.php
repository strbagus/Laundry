<?php
include '../koneksi.php';

//mengambil data dari halaman paket edit
$id = $_POST['id'];
$outlet = $_POST['outlet'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];

//melakukan perintah sql untuk update data paket
$update_paket = "update tb_paket set paket_outlet='$outlet', paket_jenis='$jenis',
paket_harga='$harga' where paket_id='$id'";
mysqli_query($koneksi, $update_paket);

//mengarahkan kehalaman paket dengan pesan berhasil update
header("location:paket?alert=update");