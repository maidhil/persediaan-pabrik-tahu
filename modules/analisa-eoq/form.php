<script type="text/javascript">
  function tampil_barang(input){
    var num = input.value;

    $.post("modules/analisa-eoq/barang.php", {
      dataidbarang: num,
    }, function(response) {      
      $('#harga_beli').html(response)

      document.getElementById('harga_beli').focus();
    });
  }

  function hitung_jumlah_pesan_ekonomis() {
    bil1 = document.formeoq.harga_beli.value;
    bil2 = document.formeoq.kebutuhan.value;
    bil3 = document.formeoq.biaya_penyimpanan.value;
    bil4 = document.formeoq.biaya_pesan.value;

    if (bil2 == "") {
      var hasil = "";
    }
    else {
      var hasil = Math.sqrt((2 * eval(bil2) * eval(bil4)) / eval(bil3));
    }

    document.formeoq.jumlah_pesan_ekonomis.value = (hasil);
  }
</script>

 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Analisa EOQ
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=analisa_eoq"> Analisa EOQ </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/analisa-eoq/proses.php?act=insert" method="POST" name="formeoq">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_eoq,5) as kode FROM is_analisa_eoq
                                                ORDER BY kode_eoq DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil kode eoq : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_barang
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1 ;
              } else {
                  $kode = 1;
              }

              // buat kode_barang
              $buat_id   = str_pad($kode, 5, "0", STR_PAD_LEFT);
              $kode_eoq = "EOQ$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode EOQ</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_eoq" value="<?php echo $kode_eoq; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_analisa" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Barang</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="kode_barang" data-placeholder="-- Pilih barang --" onchange="tampil_barang(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_barang = mysqli_query($mysqli, "SELECT kode_barang,nama_barang FROM is_barang ORDER BY nama_barang ASC")
                                                            or die('Ada kesalahan pada query tampil barang: '.mysqli_error($mysqli));
                      while ($data_barang = mysqli_fetch_assoc($query_barang)) {
                        echo"<option value=\"$data_barang[kode_barang]\"> $data_barang[kode_barang] | $data_barang[nama_barang] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <span id='harga_beli'>
              <div class="form-group">
                <label class="col-sm-2 control-label">Harga barang</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="harga_beli" name="harga_beli" readonly required>
                </div>
              </div>
              </span>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Kebutuhan /Tahun</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="kebutuhan" name="kebutuhan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_jumlah_pesan_ekonomis(this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Biaya Pemesanan</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" id="biaya_pesan" name="biaya_pesan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_jumlah_pesan_ekonomis(this)" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Biaya Penyimpanan</label>
                <div class="col-sm-5">
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" id="biaya_penyimpanan" name="biaya_penyimpanan" autocomplete="off" onKeyPress="return goodchars(event,this)" onkeyup="hitung_jumlah_pesan_ekonomis(this)" required>
                </div>
                </div>
              </div>

              <span id='jumlah_pesan_ekonomis'>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Pemesanan Yang Ekonomis</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_pesan_ekonomis" name="jumlah_pesan_ekonomis" readonly required>
                </div>
              </div>
              </span>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=analisa_eoq" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel barang
      $query = mysqli_query($mysqli, "SELECT kode_eoq,tanggal,kode_barang,kebutuhan,biaya_pesan,biaya_penyimpanan,jumlah_pesan_ekonomis FROM is_analisa_eoq WHERE kode_eoq='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data analisa eoq : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Analisa EOQ
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=analisa_eoq"> Analisa EOQ </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/analisa-eoq/proses.php?act=update" method="POST">
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode EOQ</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_eoq" value="<?php echo $data['kode_eoq']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_masuk" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Barang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_barang" value="<?php echo $data['kode_barang']; ?>" readonly required>
                </div>
              </div>

              <span id='harga_beli'>
              <div class="form-group">
                <label class="col-sm-2 control-label">Harga /unit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="harga_beli" name="harga_beli" readonly required>
                </div>
              </div>
              </span>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Kebutuhan /Tahun</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="kebutuhan" name="kebutuhan" autocomplete="off" value="<?php echo $data['kebutuhan']; ?>" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_jumlah_pesan_ekonomis(this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Biaya Simpan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="biaya_penyimpanan" name="biaya_penyimpanan" autocomplete="off" value="<?php echo $data['biaya_penyimpanan']; ?>" onKeyPress="return goodchars(event,this)" onkeyup="hitung_jumlah_pesan_ekonomis(this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Biaya Pesan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="biaya_pesan" name="biaya_pesan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['biaya_pesan']; ?>" onkeyup="hitung_jumlah_pesan_ekonomis(this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Pemesanan Yang Ekonomis /unit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_pesan_ekonomis" name="jumlah_pesan_ekonomis" value="<?php echo $data['jumlah_pesan_ekonomis']; ?>" readonly required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=analisa_eoq" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>