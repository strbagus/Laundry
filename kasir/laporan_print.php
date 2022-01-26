<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi LyJo</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<body>
    <!-- cek apakah sudah login -->
    <?php
    session_start();
    if($_SESSION['status']!="admin_login"){
        header("location:../index.php?pesan=belum_login");
    }
    ?>

    <?php
        // koneksi database
        include '../koneksi.php';
    ?>

    <div class="container">
        <center><h2>LyJo " Laundry Jogja "</h2></center>
        <br/>
        <br/>
        <?php
        if(isset($_GET['dari']) && isset($_GET['sampai'])){
        $dari = $_GET['dari'];
        $sampai = $_GET['sampai'];
        ?>
        <h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai<b><?php echo $sampai; ?></b></h4>

        <table class="table table-bordered table-striped">
            <tr>
                <th width="1%">No</th>
                <th>Invoice</th>
                <th>Tanggal Masuk</th>
                <th>Outlet</th>
                <th>Pelanggan</th>
                <th>Berat (Kg)</th>
                <th>Tgl. Selesai</th>
                <th>Paket</th>
                <th>Harga</th>
                <th>Status Bayar</th>
                <th>Status Barang</th>
            </tr>
            <?php

                // mengambil data pelanggan dari database
                $data = mysqli_query($koneksi,"select * from
                tb_transaksi,tb_pelanggan,tb_outlet,tb_paket where
                transaksi_pelanggan=pelanggan_id and transaksi_outlet=outlet_id and
                transaksi_paket=paket_id
                and date(transaksi_masuk) > '$dari' and date(transaksi_masuk) < '$sampai'
                order by transaksi_id desc");
                $no = 1;
                // mengubah data ke array dan menampilkannya dengan perulangan while
                while($d=mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                <td><?php echo $d['transaksi_masuk']; ?></td>
                <td><?php echo $d['outlet_nama']; ?></td>
                <td><?php echo $d['pelanggan_nama']; ?></td>
                <td><?php echo $d['transaksi_berat']; ?></td>
                <td><?php echo $d['transaksi_selesai']; ?></td>
                <td><?php echo $d['paket_jenis']; ?></td>
                <td><?php echo "Rp.".number_format($d['transaksi_harga']) ." ,-"; ?></td>
                <td>
                    <?php
                        if($d['transaksi_bayar']=="belum"){
                            echo "<div class='label label-danger'>BELUM BAYAR</div>";
                        }else if($d['transaksi_bayar']=="lunas"){
                            echo "<div class='label label-success'>SUDAH LUNAS</div>";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if($d['transaksi_status']=="proses"){
                            echo "<div class='label label-warning'>PROSES</div>";
                        }else if($d['transaksi_status']=="selesai"){
                            echo "<div class='label label-info'>SELESAI</div>";
                        }else if($d['transaksi_status']=="diambil"){
                            echo "<div class='label label-success'>DIAMBIL</div>";
                        }
                    ?>

                </td>
            </tr>
        <?php
        }
        ?>
        </table>
    <?php } ?>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>