<?php
include '../koneksi.php';

//mengambil data dari halaman edit
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];

//membuat perintah sql melakukan update pada tabel outlet
$update_outlet = "update tb_outlet set outlet_nama='$nama', outlet_alamat='$alamat',
outlet_telp='$telp' where outlet_id='$id'";
mysqli_query($koneksi, $update_outlet);

//mengarahkan kembali ke halaman outlet
header("location:outlet?alert=update");