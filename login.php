<?php
    // menghubungkan dengan koneksi
    include 'koneksi.php';
    // menangkap data yang dikirim dari form
    $username = $_POST['username'];
    $password = md5($_POST['password']); //melakukan enkripsi menjadi format MD5
    // mencari data pada tabel user sesuai data inputan form
    $sql = "SELECT * FROM tb_user WHERE user_username='$username' AND user_password='$password'";
    // membuat variabel mengkonfirmasi data antara aplikasi dengan database
    $login = mysqli_query($koneksi, $sql);
    //membuat value untuk membaca kondisi data, jika ditemukan value 1 jika tidak 0
    $cek = mysqli_num_rows($login);

    //membuat algoritma decision menggunakan value kondisi data
    if($cek > 0){
        //memecah data menjadi perkolom dari tabel
        $data = mysqli_fetch_assoc($login);

        //mengaktifkan session
        session_start();
        $_SESSION['id'] = $data['user_id'];
        $_SESSION['username'] = $data['user_username'];
        $_SESSION['nama'] = $data['user_nama'];
        $_SESSION['level'] = $data['user_level'];

        //membuat algoritma untuk membedakan data level user sebagai bahan penentuan login
        if($data['user_level'] == "admin"){
            header("location:admin/");
            //membuat kondisi session untuk akses data
            $_SESSION['status'] = "admin_login";
        }else if($data['user_level'] == "kasir"){
            header("location:kasir/");
            //membuat kondisi session untuk akses data
            $_SESSION['status'] = "kasir_login";
        }else if($data['user_level'] == "owner"){
            header("location:owner/");
            //membuat kondisi session untuk akses data
            $_SESSION['status'] = "owner_login";
        }else{
            header("location:index?alert=gagal");
        }
    }else{
        header("location:index?alert=gagal");
    }