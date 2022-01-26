    <?php include 'header.php'; ?>
    <!-- akhir menu navigasi -->
    <div class="container">
        <div class="alert alert-info text-center">
            <h4 style="margin-bottom: 0px"><b>Selamat datang!</b> di aplikasi Laundry LyJo. Anda login Sebagai Kasir!</h4>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <h4>Dashboard</h4>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span class="pull-right">
                                        <?php
                                            $pelanggan = mysqli_query($koneksi,"select * from tb_pelanggan");
                                            echo mysqli_num_rows($pelanggan);
                                        ?>
                                    </span>
                                </h1>Jumlah Pelanggan
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-retweet"></i>
                                    <span class="pull-right">
                                        <?php
                                            $proses = mysqli_query($koneksi,"select * from tb_transaksi where transaksi_status='proses'");
                                            echo mysqli_num_rows($proses);
                                        ?>
                                    </span>
                                </h1>Jumlah Cucian Di Proses
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-info-sign"></i>
                                    <span class="pull-right">
                                        <?php
                                            $proses = mysqli_query($koneksi,"select * from tb_transaksi where transaksi_status='diambil'");
                                            echo mysqli_num_rows($proses);
                                        ?>
                                    </span>
                                </h1>Jumlah Cucian Siap Ambil
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-ok-circle"></i>
                                    <span class="pull-right">
                                        <?php
                                            $proses = mysqli_query($koneksi,"select * from tb_transaksi where transaksi_status='diambil'");
                                            echo mysqli_num_rows($proses);
                                        ?>
                                    </span>
                                </h1>Jumlah Cucian Selesai
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <h4>Riwayat Transaksi Terakhir</h4>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="1%">NO</th>
                        <th>Nama Outlet</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Paket</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Selesai</th>
                        <th>Berat (KG)</th>
                        <th>Total Harga</th>
                        <th>Status Bayar</th>
                        <th>Status Transaksi</th>
                    </tr>
                    <?php
                        $no=1;

                        $data = mysqli_query($koneksi,"SELECT * FROM tb_transaksi,
                                                                        tb_user,
                                                                        tb_outlet,
                                                                        tb_paket,
                                                                        tb_pelanggan 
                                                        where tb_outlet.outlet_id=tb_transaksi.transaksi_outlet &&
                                                        tb_paket.paket_id=tb_transaksi.transaksi_paket &&
                                                        tb_pelanggan.pelanggan_id=tb_transaksi.transaksi_pelanggan &&
                                                        tb_user.user_id=tb_transaksi.transaksi_user");
                        while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['outlet_nama']; ?></td>
                        <!-- <td><?php echo $d['user_nama']; ?></td> -->
                        <td><?php echo $d['pelanggan_nama']; ?></td>
                        <td><?php echo $d['paket_jenis']; ?></td>
                        <td><?php echo $d['transaksi_masuk']; ?></td>
                        <td><?php echo $d['transaksi_selesai']; ?></td>
                        <td><?php echo $d['transaksi_berat']; ?></td>
                        <td><?php echo "Rp.".number_format($d['transaksi_harga']) .""; ?></td>
                        <td>
                        <?php
                            if($d['transaksi_bayar']=="belum"){
                                echo "<div class='label label-danger'>BELUM</div>";
                            }else if($d['transaksi_bayar']=="lunas"){
                                echo "<div class='label label-success'>LUNAS</div>";
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
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

