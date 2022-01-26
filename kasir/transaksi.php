<?php include 'header.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Transaksi</h4>
        </div>

        <div class="panel-body">
            <a href="transaksi_add" class="btn btn-sm btn-info pull-right">Tambah Transaksi</a>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-datatable">
                    <thead>
                        <tr>
                            <th width="1%">NO</th>
                            <th>Nama Outlet</th>
                            <!-- <th>Nama User</th> -->
                            <th>Nama Pelanggan</th>
                            <th>Nama Paket</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Selesai</th>
                            <th>Berat (KG)</th>
                            <th>Total Harga</th>
                            <th>Status Bayar</th>
                            <th>Status Transaksi</th>
                            <th width="20%">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($koneksi,"SELECT * FROM tb_transaksi, tb_user,
                    tb_outlet, tb_paket, tb_pelanggan where tb_outlet.outlet_id=tb_transaksi.transaksi_outlet &&
                    tb_paket.paket_id=tb_transaksi.transaksi_paket &&
                    tb_pelanggan.pelanggan_id=tb_transaksi.transaksi_pelanggan &&
                    tb_user.user_id=tb_transaksi.transaksi_user");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['outlet_nama']; ?></td>
                            <!-- <td><?php echo $d['user_nama']; ?></td> -->
                            <td><?php echo $d['pelanggan_nama']; ?></td>
                            <td><?php echo $d['paket_jenis']; ?></td>
                            <td><?php echo $d['transaksi_masuk']; ?></td>
                            <td><?php echo $d['transaksi_selesai']; ?></td>
                            <td><?php echo $d['transaksi_berat']; ?></td>
                            <td><?php echo "Rp.".number_format($d['transaksi_harga']) .""; ?></td>
                            <td>
                            <?php

                            if($d['transaksi_bayar']=="belum"){
                                echo "<div class='label label-danger'>BELUM</div>";
                            }else if($d['transaksi_bayar']=="lunas"){
                                echo "<div class='label label-success'>LUNAS</div>";
                            }
                            ?>
                            </td>
                            <td>
                            <?php
                            if($d['transaksi_status']=="proses"){
                                echo "<div class='label label-warning'>PROSES</div>";
                            }else if($d['transaksi_status']=="selesai"){
                                echo "<div class='label label-info'>SELESAI</div>";
                            }else if($d['transaksi_status']=="diambil"){
                                echo "<div class='label label-success'>DIAMBIL</div>";
                            }
                            ?>
                            </td>
                            <td>
                                <a href="transaksi_invoice.php?id=<?php echo $d['transaksi_id']; ?>" target="_blank" class="btn btn-sm btn-success">Invoice</a>
                                <a href="transaksi_edit.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" onClick = "confirm_modal('transaksi_delete.php?id=<?php echo $d['transaksi_id']; ?>');" class="btn btn-sm btn-danger">Batal</a>
                                
                                <a href="transaksi_status?id=<?php echo $d['transaksi_id']; ?>" class='btn btn-primary'>Update Status</a>          
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