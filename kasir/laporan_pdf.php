<?php
// menghubungkan dengan dompdf
require_once("../assets/DomPdf/autoload.inc.php");

// koneksi database
include '../koneksi.php';

$html = '<!DOCTYPE html>';
$html .= '<html>';
$html .= '<head>';
$html .= ' <title>Aplikasi LyJo</title>';
$html .= '</head>';
$html .= '<body>';
$html .= '<center><h2>LyJo " Laundry Jogja "</h2></center>';

$dari = $_GET['dari'];
$sampai = $_GET['sampai'];

$html .= '<h4>Data Laporan Laundry LyJo dari <b>'.$dari.'</b> sampai
<b>'.$sampai.'</b></h4>';
$html .= '<table border="1" width="100%">';
$html .= '<tr>';
$html .= '<th width="1%">No</th>';
$html .= '<th>Invoice</th>';
$html .= '<th>Tanggal Masuk</th>';
$html .= '<th>Outlet</th>';
$html .= '<th>Pelanggan</th>';
$html .= '<th>Berat (Kg)</th>';
$html .= '<th>Tgl. Selesai</th>';
$html .= '<th>Paket</th>';
$html .= '<th>Harga</th>';
$html .= '<th>Status Bayar</th>';
$html .= '<th>Status Barang</th>';
$html .= '</tr>';

$data = $data = mysqli_query($koneksi,"select * from
tb_transaksi,tb_pelanggan,tb_outlet,tb_paket where
transaksi_pelanggan=pelanggan_id and transaksi_outlet=outlet_id and
transaksi_paket=paket_id
and date(transaksi_masuk) > '$dari' and date(transaksi_masuk) < '$sampai' order by
transaksi_id desc");
$no = 1;

while($d=mysqli_fetch_array($data)){
    $html .= '<tr>';
    $html .= '<td>'.$no++.'</td>';
    $html .= '<td>INVOICE-'.$d['transaksi_id'].'</td>';
    $html .= '<td>'.$d['transaksi_masuk'].'</td>';
    $html .= '<td>'.$d['outlet_nama'].'</td>';
    $html .= '<td>'.$d['pelanggan_nama'].'</td>';
    $html .= '<td>'.$d['transaksi_berat'].'</td>';
    $html .= '<td>'.$d['transaksi_selesai'].'</td>';
    $html .= '<td>'.$d['paket_jenis'].'</td>';
    $html .= '<td> Rp. '.number_format($d["transaksi_harga"]).' ,-</td>';
    $html .= '<td>';

    if($d['transaksi_bayar']=="belum"){
        $html .= "BELUM BAYAR";
    }else if($d['transaksi_bayar']=="lunas"){
        $html .= "SUDAH LUNAS";
    }

    $html .= '</td>';
    $html .= '<td>';

    if($d['transaksi_status']=="proses"){
        $html .= "PROSES";
    }else if($d['transaksi_status']=="selesai"){
        $html .= "SELESAI";
    }else if($d['transaksi_status']=="diambil"){
        $html .= "DIAMBIL";
    }
    $html .= '</td>';
    $html .= '</tr>';
}

$html .= '</table>';
$html .= '</body>';
$html .= '</html>';

//memanggil lib class dompdf
use Dompdf\Dompdf;
use Dompdf\Options;

$dompdf = new Dompdf();
$dompdf->set_paper('a4', 'potrait');
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('laporan_laundry_LyJo.pdf');