<?php
include '../koneksi.php';

//mengambil data dari form pelanggan add
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$outlet = $_POST['outlet'];
$jenis = $_POST['jenis'];

//melakukan perintah sgl input pada tabel pelanggan
mysqli_query($koneksi, "insert into tb_pelanggan values (NULL,
'$nama','$alamat','$telp','$outlet','$jenis')");

//mengarahkan kembali pada halaman pelanggan dengan pesan data berhasil ditambahkan
header("location:pelanggan?alert=create");