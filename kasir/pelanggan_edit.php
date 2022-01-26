<?php include 'header.php'; ?>

<div class="container">
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Pelanggan</h4>
                <a href="pelanggan" class="btn btn-warning btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a>
            </div>
            <div class="panel-body">
                <?php
                // koneksi database
                include '../koneksi.php';
                ?>
                <form action="pelanggan_update" method="post">
                <?php
                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "select * from tb_pelanggan where
                pelanggan_id='$id'");
                $outlet = mysqli_query($koneksi, "select * from tb_outlet");
                while($d = mysqli_fetch_array($data)){
                ?>
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $d['pelanggan_nama'] ?>" required="required">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $d['pelanggan_id'] ?>" required="required">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $d['pelanggan_alamat'] ?>" required="required">
                    </div>

                    <div class="form-group">
                        <label>No. Telephone</label>
                        <input type="number" class="form-control" name="telp" value="<?php echo $d['pelanggan_telp'] ?>" required="required">
                    </div>

                    <div class="form-group">
                        <label>Nama Outlet</label>
                        <select class="form-control" name="outlet" required="required">
                        <?php while ($l = mysqli_fetch_array($outlet)) { ?>
                            <option <?php if($d['pelanggan_outlet'] == $l['outlet_id']){echo "selected='selected'";} ?> value="<?php echo $l['outlet_id'] ?>"><?php echo $l['outlet_nama'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <!-- Membuat inputan menggunakan option inputan -->
                    <div class="form-group">
                        <label>Jenis Pelanggan</label>
                        <select class="form-control" name="jenis" required="required">
                            <option value="<?php echo $d['pelanggan_jenis'] ?>"><?php echo $d['pelanggan_jenis'] ?></option>
                            <option value="reguler">Reguler</option>
                            <option value="member">Member</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                    </div>
                <?php
                }
                ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>