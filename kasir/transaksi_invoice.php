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
    if($_SESSION['status']!="kasir_login"){
    header("location:../index.php?pesan=belum_login");
    }
    ?>

    <?php
    // koneksi database
    include '../koneksi.php';
    ?>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
        <?php
        // menangkap id yang dikirim melalui url
        $id = $_GET['id'];
        // megambil data transaksi yang ber id di atas dari tabel transaksi
        $transaksi = mysqli_query($koneksi,"select * from

        tb_transaksi,tb_pelanggan,tb_outlet,tb_paket
        where transaksi_id='$id' and transaksi_pelanggan=pelanggan_id and
        transaksi_outlet=outlet_id
        and transaksi_paket=paket_id" );

        while($t=mysqli_fetch_array($transaksi)){
        ?>
            <h3><center><h2>LyJo " Laundry Jogja "</h2></center></h3>

            <!-- membuat tombol print invoice memanggil function dalam javascript -->
            <a href="#" onclick="printPage()" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i> CETAK</a>
            <br/>
            <br/>

            <table class="table">
                <tr>
                    <th width="20%">No. Invoice</th>
                    <th>:</th>
                    <td>INVOICE-<?php echo $t['transaksi_id']; ?></td>
                </tr>

                <tr>
                    <th>Nama Outlet</th>
                    <th>:</th>
                    <td><?php echo $t['outlet_nama']; ?></td>
                </tr>

                <tr>
                    <th width="20%">Tgl. Laundry</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_masuk']; ?></td>
                </tr>

                <tr>
                    <th>Nama Pelanggan</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_pelanggan']; ?></td>
                </tr>

                <tr>
                    <th>HP</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_telp']; ?></td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_alamat']; ?></td>
                </tr>

                <tr>
                    <th>Berat Cucian (Kg)</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_berat']; ?></td>
                </tr>

                <tr>
                    <th>Jenis Paket</th>
                    <th>:</th>
                    <td><?php echo $t['paket_jenis']; ?></td>
                </tr>

                <tr>
                    <th>Tgl. Selesai</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_selesai']; ?></td>
                </tr>

                <tr>
                    <th>Total Harga</th>
                    <th>:</th>
                    <td><?php echo "Rp.".number_format($t['transaksi_harga'])." ,-"; ?></td>
                </tr>

                <tr>
                    <th>Status Bayar</th>
                    <th>:</th>
                    <td>
                    <?php
                    if($t['transaksi_bayar']=="belum"){
                        echo "<div class='label label-danger'>BELUM BAYAR</div>";
                    }else if($t['transaksi_status']=="lunas"){
                        echo "<div class='label label-success'>SUDAH LUNAS</div>";
                    }
                    ?>
                    </td>
                </tr>

                <tr>
                    <th>Status Jasa</th>
                    <th>:</th>
                    <td>
                    <?php
                    if($t['transaksi_status']=="proses"){
                        echo "<div class='label label-warning'>PROSES</div>";
                    }else if($t['transaksi_status']=="selesai"){
                        echo "<div class='label label-info'>SELESAI</div>";
                    }else if($t['transaksi_status']=="diambil"){
                        echo "<div class='label label-success'>DIAMBIL</div>";
                    }
                    ?>
                    </td>
                </tr>
            </table>
            <br/>

            <h4 class="text-center">Daftar Cucian</h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Jenis Pakaian</th>
                    <th width="20%">Jumlah</th>
                </tr>
                <?php
                // menyimpan id transaksi ke variabel id_transaksi
                $id = $t['transaksi_id'];

                // menampilkan pakaian-pakaian dari transaksi yang ber id di atas
                $pakaian = mysqli_query($koneksi,"select * from tb_pakaian where pakaian_transaksi='$id'");

                while($p=mysqli_fetch_array($pakaian)){
                ?>
                <tr>
                    <td><?php echo $p['pakaian_jenis']; ?></td>
                    <td width="5%"><?php echo $p['pakaian_jumlah']; ?></td>
                </tr>

                <?php } ?>
            </table>
            <br/>
            <p><center><i>" Terima kasih telah mempercayakan cucian anda pada kami ".</i></center></p>
        <?php
        }
        ?>
        </div>
    </div>

    <!-- membuat fitur print page instant -->
    <script type="text/javascript">
        function printPage() {
            window.print();
        }
    </script>
</body>
</html>
