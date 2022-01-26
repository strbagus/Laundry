<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Paket</h4>
        </div>

        <div class="panel-body">
            <a href="paket_add" class="btn btn-sm btn-info pull-right">Tambah Paket</a>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="table-datatable">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Outlet</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th width="15%">OPSI</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    // koneksi database
                    include '../koneksi.php';

                    // mengambil data paket dari database menggabungkan dengan tabel outlet
                    $sql_paket = "SELECT * FROM tb_outlet, tb_paket where
                    tb_outlet.outlet_id=tb_paket.paket_outlet";
                    $data = mysqli_query($koneksi,$sql_paket);
                    $no = 1;

                    // mengubah data ke array dan menampilkannya dengan perulangan while
                    while($d=mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['outlet_nama']; ?></td>
                            <td><?php echo $d['paket_jenis']; ?></td>
                            <td><?php echo $d['paket_harga']; ?></td>
                            <td>
                                <a href="paket_edit.php?id=<?php echo $d['paket_id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                <a href="#" onClick ="confirm_modal('paket_delete.php?id=<?php echo $d['paket_id']; ?>');" class="btn btn-sm
                                btn-danger">Hapus</a>
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