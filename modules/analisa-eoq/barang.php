<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

if(isset($_POST['dataidbarang'])) {
	$kode_barang = $_POST['dataidbarang'];

  // fungsi query untuk menampilkan data dari tabel barang
  $query = mysqli_query($mysqli, "SELECT kode_barang,nama_barang,harga_beli FROM is_barang WHERE kode_barang='$kode_barang'")
                                  or die('Ada kesalahan pada query tampil data barang: '.mysqli_error($mysqli));

  // tampilkan data
  $data = mysqli_fetch_assoc($query);

  $harga_beli   = $data['harga_beli'];
  
	if($harga_beli != '') {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Harga /unit</label>
                <div class='col-sm-5'>
                    <input type='text' class='form-control' id='harga_beli' name='harga_beli' value='$harga_beli' readonly>
                </div>
              </div>";
	} else {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Harga /unit</label>
                <div class='col-sm-5'>
                    <input type='text' class='form-control' id='harga_beli' name='harga_beli' value='Harga barang tidak ditemukan' readonly>
                </div>
              </div>";
	}		
}
?> 