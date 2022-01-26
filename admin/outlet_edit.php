<?php include 'header.php'; ?>

<div class="container">
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Outlet</h4>
                <a href="outlet" class="btn btn-warning btn-sm pull-right"><i class="fa fa-
                reply"></i> &nbsp Kembali</a>
            </div>

            <div class="panel-body">
            <?php
            // koneksi database
            include '../koneksi.php';
            ?>

                <form action="outlet_update" method="post">
                <?php
                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "select * from tb_outlet where
                outlet_id='$id'");
                while($d = mysqli_fetch_array($data)){
                ?>
                    <div class="form-group">
                        <label>Nama Outlet</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $d['outlet_nama'] ?>" required="required">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $d['outlet_id'] ?>" required="required">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $d['outlet_alamat'] ?>" required="required">
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="number" class="form-control" name="telp" value="<?php echo $d['outlet_telp'] ?>" required="required">
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