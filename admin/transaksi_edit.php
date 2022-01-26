<?php include 'header.php'; ?>

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Transaksi</h4>
                <a href="transaksi" class="btn btn-warning btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a>
            </div>
            <div class="panel-body">
            <?php
            // koneksi database
            include '../koneksi.php';
            ?>
                <form action="transaksi_update" method="post" enctype="multipart/form-data">

                <?php
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "select * from tb_transaksi where
                    transaksi_id='$id'");
                    $outlet = mysqli_query($koneksi, "select * from tb_outlet");
                    $pelanggan = mysqli_query($koneksi, "select * from tb_pelanggan");
                    $paket = mysqli_query($koneksi, "select * from tb_paket");
                    while($d = mysqli_fetch_array($data)){
                ?>
                    <!-- menyimpan id transaksi yang di edit dalam form hidden berikut -->
                    <input type="hidden" name="id" value="<?php echo $d['transaksi_id']; ?>">
                    <div class="form-group">
                        <label>Nama Outlet</label>
                        <select class="form-control" name="outlet" required="required">
                        <?php while ($l = mysqli_fetch_array($outlet)) { ?>
                            <option <?php if($d['transaksi_outlet'] == $l['outlet_id']){echo "selected='selected'";} ?> value="<?php echo $l['outlet_id'] ?>"><?php echo $l['outlet_nama'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <select class="form-control" name="pelanggan" required="required">
                        <?php while ($l = mysqli_fetch_array($pelanggan)) { ?>
                            <option <?php if($d['transaksi_pelanggan'] == $l['pelanggan_id']){echo "selected='selected'";} ?> value="<?php echo $l['pelanggan_id'] ?>"><?php echo $l['pelanggan_nama'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Paket</label>
                        <select class="form-control" name="paket" required="required">
                        <?php while ($l = mysqli_fetch_array($paket)) { ?>
                            <option <?php if($d['transaksi_paket'] == $l['paket_id']){echo "selected='selected'";} ?> value="<?php echo $l['paket_id'] ?>"><?php echo $l['paket_jenis'] ?></option>
                        <?php } ?>
                        </select>
                    </div> 

                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" class="form-control" name="berat" placeholder="Masukkan berat cucian .." required="required" value="<?php echo $d['transaksi_berat']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Tgl. Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai" required="required" value="<?php echo $d['transaksi_selesai']; ?>">
                    </div>
                    <br/>

                    <table class="table table-bordered table-striped" id="dinamis">
                        <tr>
                            <th>Jenis Pakaian</th>
                            <th width="20%">Jumlah</th>
                        </tr>
                    <?php
                        // menyimpan id transaksi ke variabel id_transaksi
                        $id_transaksi = $d['transaksi_id'];

                        // menampilkan pakaian-pakaian dari transaksi yang ber id di atas
                        $pakaian = mysqli_query($koneksi,"select * from tb_pakaian where
                        pakaian_transaksi='$id_transaksi'");
                        while($p=mysqli_fetch_array($pakaian)){
                    ?>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" value="<?php echo $p['pakaian_jenis']; ?>"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" value="<?php echo $p['pakaian_jumlah']; ?>"></td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                            <th><button type="button" class="btn btn-blue add-row">+</button></th>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                            <td><button type="button" class="btn btn-danger delete-row">-</button></td>
                        </tr>
                    </table>

                    <div class="form-group alert alert-warning">
                        <label>Bayar</label>
                        <select class="form-control" name="bayar" required="required">
                            <option <?php if($d['transaksi_bayar']=="belum"){echo "selected='selected'";} ?> value="belum">BELUM</option>
                            <option <?php if($d['transaksi_bayar']=="lunas"){echo "selected='selected'";} ?> value="lunas">LUNAS</option>
                        </select>
                    </div>

                    <div class="form-group alert alert-info">
                        <label>Status</label>
                        <select class="form-control" name="status" required="required">
                            <option <?php if($d['transaksi_status']=="proses"){echo "selected='selected'";} ?> value="proses">PROSES</option>
                            <option <?php if($d['transaksi_status']=="selesai"){echo "selected='selected'";} ?> value="selesai">SELESAI</option>
                            <option <?php if($d['transaksi_status']=="diambil"){echo "selected='selected'";} ?> value="diambil">DIAMBIL</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>