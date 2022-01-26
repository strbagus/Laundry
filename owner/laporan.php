<?php include 'header.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Filter Laporan</h4>
        </div>

        <div class="panel-body">
            <form action="laporan" method="get">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th width="1%"></th>
                    </tr>

                    <tr>
                        <td>
                            <br/>
                            <input type="date" name="tgl_dari" class="form-control">
                        </td>
                        <td>
                            <br/>
                            <input type="date" name="tgl_sampai" class="form-control">
                            <br/>
                        </td>
                        <td>
                            <br/><input type="submit" class="btn btn-primary" value="Filter">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<br/>
<?php
if(isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])){
$dari = $_GET['tgl_dari'];
$sampai = $_GET['tgl_sampai'];
?>
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai
            <b><?php echo $sampai; ?></b></h4>
        </div>

        <div class="panel-body">
            <a target="_blank" href="laporan_print.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i>CETAK</a>            
            <a target="_blank" href="laporan_pdf.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK PDF</a>
            <br/>
            <br/>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Invoice</th>
                    <th>Tanggal Masuk</th>
                    <th>Outlet</th>
                    <th>Pelanggan</th>
                    <th>Berat (Kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Paket</th>
                    <th>Harga</th>
                    <th>Status Bayar</th>
                    <th>Status Barang</th>
                </tr>

                <?php
                // koneksi database
                include '../koneksi.php';

                // mengambil data pelanggan dari database
                $data = mysqli_query($koneksi,"select * from tb_transaksi,tb_pelanggan,tb_outlet,tb_paket where transaksi_pelanggan=pelanggan_id and transaksi_outlet=outlet_id and transaksi_paket=paket_id and date(transaksi_masuk) > '$dari' and date(transaksi_masuk) < '$sampai' order by transaksi_id desc");

                $no = 1;
                // mengubah data ke array dan menampilkannya dengan perulangan while

                while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                    <td><?php echo $d['transaksi_masuk'];?></td>
                    <td><?php echo $d['outlet_nama']; ?></td>
                    <td><?php echo $d['pelanggan_nama']; ?></td>
                    <td><?php echo $d['transaksi_berat']; ?></td>
                    <td><?php echo $d['transaksi_selesai']; ?></td>
                    <td><?php echo $d['paket_jenis']; ?></td>
                    <td><?php echo "Rp.".number_format($d['transaksi_harga']) ." ,-"; ?></td>
                    <td>
                        <?php
                        if($d['transaksi_bayar']=="belum"){ 
                            echo "<div class='label label-danger'>BELUM BAYAR</div>";
                        }else if($d['transaksi_bayar']=="lunas"){
                            echo "<div class='label label-success'>SUDAH LUNAS</div>";
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
                </tr>
            <?php
            }
            ?>
            </table>
        </div>
    </div>
<?php } ?>
</div>
<?php include 'footer.php'; ?>