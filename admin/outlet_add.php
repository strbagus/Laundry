<?php include 'header.php'; ?>

<div class="container">
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Outlet Baru</h4>
                <a href="outlet" class="btn btn-warning btn-sm pull-right"><i class="fa fa-
                reply"></i> &nbsp Kembali</a>
            </div>
            <div class="panel-body">
                <form action="outlet_addAction" method="post">
                    <div class="form-group">
                        <label>Nama Outlet</label>
                        <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama Outlet ..">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" required="required" placeholder="Masukkan alamat ..">
                    </div>

                    <div class="form-group">
                        <label>No. Telephone</label>
                        <input type="number" class="form-control" name="telp" required="required" placeholder="Masukkan No Telephone ..">
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