<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $kode_eoq              = mysqli_real_escape_string($mysqli, trim($_POST['kode_eoq']));
            
            $tanggal        = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_analisa']));
            $exp             = explode('-',$tanggal);
            $tanggal_analisa   = $exp[2]."-".$exp[1]."-".$exp[0];

            $kode_barang           = mysqli_real_escape_string($mysqli, trim($_POST['kode_barang']));
            $kebutuhan             = mysqli_real_escape_string($mysqli, trim($_POST['kebutuhan']));
            $biaya_penyimpanan     = mysqli_real_escape_string($mysqli, trim($_POST['biaya_penyimpanan']));
            $biaya_pesan           = mysqli_real_escape_string($mysqli, trim($_POST['biaya_pesan']));
            $jumlah_pesan_ekonomis = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_pesan_ekonomis']));


            $created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel barang
            $query = mysqli_query($mysqli, "INSERT INTO is_analisa_eoq(kode_eoq,tanggal_analisa,kode_barang,kebutuhan,biaya_pesan,biaya_penyimpanan,jumlah_pesan_ekonomis,created_user) 
                                            VALUES('$kode_eoq','$tanggal_analisa','$kode_barang','$kebutuhan','$biaya_pesan','$biaya_penyimpanan','$jumlah_pesan_ekonomis','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=analisa_eoq&alert=1");
            
            }   
        }
    }       
}       
?>