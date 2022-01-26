<?php
include '../koneksi.php';

//mengambil data user_id dari session
session_start();
$id = $_SESSION['id'];
$password = md5($_POST['password_baru']);

mysqli_query($koneksi, "UPDATE tb_user SET user_password='$password' WHERE user_id='$id'")or die(mysqli_errno($koneksi));

header("location:password?alert=password");