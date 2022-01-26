<?php include 'header.php'; ?>

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Transaksi Baru</h4>
                <a href="transaksi" class="btn btn-warning btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a>
            </div>
            <div class="panel-body">

            <?php
            // koneksi database
            include '../koneksi.php';

            // mengambil data dari database
            $user = mysqli_query($koneksi, "select * from tb_user");
            $outlet = mysqli_query($koneksi, "select * from tb_outlet");
            $pelanggan = mysqli_query($koneksi, "select * from tb_pelanggan");
            $paket = mysqli_query($koneksi, "select * from tb_paket");
            ?>
                <form action="transaksi_addAction" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Outlet</label>
                        <select class="form-control" name="outlet" required="required">
                            <option disabled selected> -- Pilih Outlet --</option>
                            <?php while ($d = mysqli_fetch_array($outlet)) { ?>
                            <option value="<?php echo $d['outlet_id'] ?>"><?php echo $d['outlet_nama'] ?>
                            </option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Petugas</label>
                        <select class="form-control" name="user" required="required">
                            <option disabled selected> -- Pilih User --</option>
                            <?php while ($d = mysqli_fetch_array($user)) { ?>
                            <option value="<?php echo $d['user_id'] ?>"><?php echo $d['user_nama'] ?>
                            </option>
                        <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <select class="form-control" name="pelanggan" required="required">
                            <option disabled selected> -- Pilih Pelanggan --</option>
                            <?php while ($d = mysqli_fetch_array($pelanggan)) { ?>
                            <option value="<?php echo $d['pelanggan_id'] ?>"><?php echo $d['pelanggan_nama'] ?>
                            </option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Paket</label>
                        <select class="form-control" name="paket" required="required">
                            <option disabled selected> -- Pilih Jenis Paket --</option>
                            <?php while ($d = mysqli_fetch_array($paket)) { ?>
                            <option value="<?php echo $d['paket_id'] ?>"><?php echo $d['paket_jenis'] ?>
                            </option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai" required="required" placeholder="Masukkan Tanggal Selesai ..">
                    </div>

                    <div class="form-group">
                        <label>Total Berat</label>
                        <input type="text" class="form-control" name="berat" required="required" placeholder="Masukkan Total Berat Pakaian ..">
                    </div>

                    <div class="col-md-12">
                        <h4 class="box-title">Detail Transaksi Pakaian</h4>

                        <table class="table table-hover" id="dinamis">
                            <thead>
                                <tr>
                                    <th>Jenis Pakaian</th>
                                    <th>Jumlah</th>
                                    <th><button type="button" class="btn btn-blue add-row">+</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                    <td><button type="button" class="btn btn-danger delete-row">-</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>