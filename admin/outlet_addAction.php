<?php
//memanggil data koneksi
include '../koneksi.php';

//mengambil data dari form user
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];

//membuat eksekusi sql untuk memasukan data kedalam database
$addoutlet = "insert into tb_outlet values (NULL, '$nama','$alamat','$telp')";
mysqli_query($koneksi, $addoutlet);

//mengarahkan halaman setelah melakukan perintah sql
header("location:outlet?alert=create");