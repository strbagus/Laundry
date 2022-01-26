<?php include 'header.php'; ?>

<div class="container">
    <br />
    <br />
    <br />
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Paket Baru</h4>
                <a href="paket" class="btn btn-warning btn-sm pull-right"><i class="fa fa-
                reply"></i> &nbsp Kembali</a>
            </div>
            <div class="panel-body">

            <?php

            // koneksi database
            include '../koneksi.php';
            // mengambil data outlet dari database
            $outlet = mysqli_query($koneksi, "select * from tb_outlet");

            ?>

                <form action="paket_addAction" method="post">
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
                        <label>Jenis Paket</label>
                        <select class="form-control" name="jenis" required="required">
                        <option disabled selected> -- Pilih Jenis Paket --
                        </option>
                        <option value="reguler">Reguler</option>
                        <option value="kilat">Kilat</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" required="required"
                        placeholder="Masukkan Harga Paket ..">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary"
                        value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>