<?php include 'header.php'; ?>

<div class="container">
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Pelanggan Baru</h4>
                <a href="pelanggan" class="btn btn-warning btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a>
            </div>
            <div class="panel-body">
            <?php
            // koneksi database
            include '../koneksi.php';
            // mengambil data outlet dari database
            $outlet = mysqli_query($koneksi, "select * from tb_outlet");
            ?>
                <form action="pelanggan_addAction" method="post">
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama Pelanggan ..">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" required="required" placeholder="Masukkan alamat ..">
                    </div>

                    <div class="form-group">
                        <label>No. Telephone</label>
                        <input type="number" class="form-control" name="telp" required="required" placeholder="Masukkan No Telephone ..">
                    </div>

                    <!-- Membuat inputan menggunakan option inputan sesuai data
                    pada database -->
                    <div class="form-group">
                        <label>Nama Outlet</label>
                        <select class="form-control" name="outlet" required="required">
                            <option disabled selected> -- Pilih Outlet --</option>
                            <?php while ($d = mysqli_fetch_array($outlet)) { ?>
                            <option value="<?php echo $d['outlet_id'] ?>"><?php echo $d['outlet_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Membuat inputan menggunakan option inputan -->
                    <div class="form-group">
                        <label>Jenis Pelanggan</label>
                        <select class="form-control" name="jenis" required="required">
                            <option disabled selected> -- Pilih Jenis Pelanggan --</option>
                            <option value="reguler">Reguler</option>
                            <option value="member">Member</option>
                        </select>
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