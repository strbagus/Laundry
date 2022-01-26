<?php
include '../koneksi.php';

//menangkap data transaksi_id yang ingin dihapus
$id = $_GET['id'];

//melakukan perintah sql hapus transaksi pada tabel transaksi
mysqli_query($koneksi, "delete from tb_transaksi where transaksi_id='$id'");

//catatan ketika kita menghapus transaksi maka data pakaian yang menggunakan transaksi_id yang sama akan ikut terhapus otomatis

//mengarahkan kembali ke halaman transaksi denga pesan berhasil hapus data
header("location:transaksi?alert=delete");