<?php include 'header.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Pelanggan</h4>
        </div>
        <div class="panel-body">
            <a href="pelanggan_add" class="btn btn-sm btn-info pull-right">Tambah Pelanggan</a>
            <br/>
            <br/>
            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover" id="table-datatable">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Nama Outlet</th>
                            <th>Jenis Pelanggan</th>
                            <th width="15%">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // koneksi database
                    include '../koneksi.php';
                    // mengambil data pelanggan dari database menggabungkan dengan tabel outlet
                    $sql_pelanggan = "SELECT * FROM tb_outlet, tb_pelanggan where tb_outlet.outlet_id=tb_pelanggan.pelanggan_outlet";
                    $data = mysqli_query($koneksi,$sql_pelanggan);
                    $no = 1;

                    // mengubah data ke array dan menampilkannya dengan perulangan while
                    while($d=mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['pelanggan_nama']; ?></td>
                            <td><?php echo $d['pelanggan_alamat']; ?></td>
                            <td><?php echo $d['pelanggan_telp']; ?></td>
                            <td><?php echo $d['outlet_nama']; ?></td>
                            <td><?php echo $d['pelanggan_jenis']; ?></td>
                            <td>
                                <a href="pelanggan_edit.php?id=<?php echo $d['pelanggan_id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                <a href="#" onClick = "confirm_modal('pelanggan_delete.php?id=<?php echo $d['pelanggan_id']; ?>');" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>