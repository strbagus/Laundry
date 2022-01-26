<?php
include '../koneksi.php';

//mengambil data dari form edit pelanggan
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$outlet = $_POST['outlet'];
$jenis = $_POST['jenis'];

//melakukan perintah sql update data tabel pelanggan
$update_pelanggan = "update tb_pelanggan set pelanggan_nama='$nama',
pelanggan_alamat='$alamat', pelanggan_telp='$telp',
pelanggan_outlet='$outlet', pelanggan_jenis='$jenis' where pelanggan_id='$id'";
mysqli_query($koneksi, $update_pelanggan);

//mengarahkan kehalaman pelanggan dengan pesan berhasil edit data
header("location:pelanggan?alert=update");