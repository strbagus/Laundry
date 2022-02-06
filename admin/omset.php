<?php
include 'header.php';
?>
<div class="container">
<br/>
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Total Omset</h4>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama Outlet</th>
                    <th>Jumlah Transaksi Selesai</th>
                    <th>Omset</th>
                </tr>

                <?php
                // koneksi database
                include '../koneksi.php';

                // mengambil data pelanggan dari database
                $data = mysqli_query($koneksi,"SELECT outlet_nama, outlet_id FROM tb_outlet ");
                $no++;
                // mengubah data ke array dan menampilkannya dengan perulangan while

                while($d=mysqli_fetch_array($data)){
                    $outlet = $d['outlet_id'];
                    $sql = mysqli_query($koneksi, "SELECT COUNT(transaksi_outlet), SUM(transaksi_harga) FROM tb_transaksi WHERE transaksi_outlet=$outlet AND transaksi_bayar='lunas'");
                    $d2 = mysqli_fetch_array($sql);
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['outlet_nama']; ?></td>
                    <td><?php echo number_format($d2['COUNT(transaksi_outlet)']) ;?></td>
                    <td><?php echo "Rp.".number_format($d2['SUM(transaksi_harga)']); ?></td>
                </tr>
            <?php
            }
            $sql3 = mysqli_query($koneksi, "SELECT SUM(transaksi_harga) FROM tb_transaksi WHERE transaksi_bayar='lunas'");
            $d3 = mysqli_fetch_array($sql3);
            
            ?>

                <tr>
                    <td colspan="3" class="text-right">Total</td>
                    <td><?php echo "Rp.".number_format($d3['SUM(transaksi_harga)']); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>