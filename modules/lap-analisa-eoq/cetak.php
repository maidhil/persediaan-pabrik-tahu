<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

// ambil data hasil submit dari form
$tgl1     = $_GET['tgl_awal'];
$explode  = explode('-',$tgl1);
$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

$tgl2      = $_GET['tgl_akhir'];
$explode   = explode('-',$tgl2);
$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];

if (isset($_GET['tgl_awal'])) {
    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel barang masuk
    $query = mysqli_query($mysqli, "SELECT kode_eoq,tanggal_analisa,a.kode_barang,kebutuhan,biaya_penyimpanan,biaya_pesan,
                                    jumlah_pesan_ekonomis,b.kode_barang,b.nama_barang,b.satuan FROM is_analisa_eoq as a INNER JOIN is_barang as b ON a.kode_barang=b.kode_barang
                                    WHERE a.tanggal_analisa BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ORDER BY kode_eoq ASC") 
                                    or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN ANALISA EOQ</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            LAPORAN ANALISA EOQ <br>
            Pabrik Tahu dan Tempe Mbak Sri
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
        </div>
    <?php
    }
    ?>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">KODE<br>EOQ</th>
                        <th height="20" align="center" valign="middle">TANGGAL</th>
                        <th height="20" align="center" valign="middle">KODE<br>BARANG</th>
                        <th height="20" align="center" valign="middle">NAMA<br>BARANG</th>
                        <th height="20" align="center" valign="middle">KEBUTUHAN</th>
                        <th height="20" align="center" valign="middle">BIAYA<br>PEMESANAN</th>
                        <th height="20" align="center" valign="middle">BIAYA<br>PENYIMPANAN</th>                        
                        <th height="20" align="center" valign="middle">JUMLAH<br>PEMESANAN<br>EKONOMIS</th>
                        <th height="20" align="center" valign="middle">SATUAN</th>
                    </tr>
                </thead>
                <tbody>
<?php
    // jika data ada
    if($count == 0) {
        echo "  <tr>
                    <td width='20' height='13' align='center' valign='middle'></td>
                    <td width='60' height='13' align='center' valign='middle'></td>
                    <td width='70' height='13' align='center' valign='middle'></td>
                    <td width='60' height='13' align='center' valign='middle'></td>
                    <td width='60' height='13' align='center' valign='middle'></td>
                    <td width='50' height='13' align='center' valign='middle'></td>
                    <td width='90' height='13' align='center' valign='middle'></td>
                    <td width='90' height='13' align='center' valign='middle'></td>
                    <td width='90' height='13' align='center' valign='middle'></td>
                    <td width='90' height='13' align='center' valign='middle'></td>
                </tr>";
    }
    // jika data tidak ada
    else {
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            $tanggal      = $data['tanggal_analisa'];
            $exp           = explode('-',$tanggal);
            $biaya_penyimpanan = format_rupiah($data['biaya_penyimpanan']);
            $biaya_pesan = format_rupiah($data['biaya_pesan']);
            $tanggal_analisa = $exp[2]."-".$exp[1]."-".$exp[0];

            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='20' height='13' align='center' valign='middle'>$no</td>
                        <td width='60' height='13' align='center' valign='middle'>$data[kode_eoq]</td>
                        <td width='70' height='13' align='center' valign='middle'>$tanggal_analisa</td>
                        <td width='60' height='13' align='center' valign='middle'>$data[kode_barang]</td>
                        <td width='60' height='13' align='center' valign='middle'>$data[nama_barang]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[kebutuhan]</td>
                        <td width='90' align='right' valign='middle'>Rp. $biaya_pesan</td>
                        <td width='90' align='right' valign='middle'>Rp. $biaya_penyimpanan</td>                        
                        <td width='90' align='center' valign='middle'>$data[jumlah_pesan_ekonomis]</td>
                        <td width='60' height='13' align='center' valign='middle'>$data[satuan]</td>
                    </tr>";
            $no++;
        }
    }
?>	
                </tbody>
            </table>

            <div id="footer-tanggal">
                Lintau buo, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                Pimpinan
            </div>
            
            <div id="footer-nama">
                Sri Sudarti
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN ANALISA EOQ.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>