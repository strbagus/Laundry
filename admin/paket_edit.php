<?php include 'header.php'; ?>

<div class="container">
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Paket</h4>
                <a href="paket" class="btn btn-warning btn-sm pull-right"><i class="fa fa-
                reply"></i> &nbsp Kembali</a>
            </div>

            <div class="panel-body">
            <?php
            // koneksi database
            include '../koneksi.php';
            ?>

                <form action="paket_update" method="post">
                <?php
                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "select * from tb_paket where paket_id='$id'");
                $outlet = mysqli_query($koneksi, "select * from tb_outlet");
                while($d = mysqli_fetch_array($data)){
                ?>
                    <div class="form-group">
                        <label>Nama Outlet</label>
                        <select class="form-control" name="outlet" required="required">
                        <?php while ($l = mysqli_fetch_array($outlet)) { ?>
                            <option <?php if($d['paket_outlet'] == $l['outlet_id']){echo "selected='selected'";} ?> value="<?php echo $l['outlet_id'] ?>"><?php echo $l['outlet_nama'] ?></option>
                        <?php } ?>
                        </select>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $d['paket_id'] ?>" required="required">
                    </div>

                    <!-- Membuat inputan menggunakan option inputan -->
                    <div class="form-group">
                        <label>Jenis Paket</label>
                        <select class="form-control" name="jenis" required="required">
                            <option value="<?php echo $d['paket_jenis'] ?>"><?php echo $d['paket_jenis'] ?></option>
                            <option value="reguler">Reguler</option>
                            <option value="kilat">Kilat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" value="<?php echo $d['paket_harga'] ?>" required="required">
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