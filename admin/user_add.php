<?php include 'header.php'; ?>

<div class="container">
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah User Baru</h4>
                <a href="user" class="btn btn-warning btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a>
            </div>

            <div class="panel-body">
            <?php
            // koneksi database
            include '../koneksi.php';
            // mengambil data outlet dari database
            $outlet = mysqli_query($koneksi, "select * from tb_outlet");
            ?>

                <form action="user_addaction" method="post">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama User ..">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required="required" placeholder="Masukkan Username ..">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required="required" min="5" placeholder="Masukkan Password ..">
                    </div>

                    <!-- Membuat inputan menggunakan option inputan sesuai data pada database -->
                    <div class="form-group">
                        <label>Outlet</label>
                        <select class="form-control" name="outlet" required="required">
                            <option disabled selected> -- Pilih Outlet --</option>
                            <?php while ($d = mysqli_fetch_array($outlet)) { ?>
                            <option value="<?php echo $d['outlet_id'] ?>"><?php echo $d['outlet_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Membuat inputan menggunakan option inputan -->
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level" required="required">
                            <option disabled selected> -- Pilih Level --</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                            <option value="owner">Owner</option>
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