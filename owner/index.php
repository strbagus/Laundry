    <?php include 'header.php'; ?>
    <!-- akhir menu navigasi -->
    <div class="container">
        <div class="alert alert-info text-center">
            <h4 style="margin-bottom: 0px"><b>Selamat datang!</b> di aplikasi Laundry LyJo. Anda login Sebagai Owner!</h4>
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
                        <th width="1%">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Berat (Kg)</th>
                        <th>Tgl. Selesai</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

