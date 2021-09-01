<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Analisa EOQ

    <a class="btn btn-primary btn-social pull-right" href="?module=form_analisa_eoq&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <?php  
      // fungsi untuk menampilkan pesan
      // jika alert = "" (kosong)
      // tampilkan pesan "" (kosong)
      if (empty($_GET['alert'])) {
      echo "";  
      } 
      // jika alert = 1
      // tampilkan pesan Sukses "Data barang baru berhasil disimpan"
      elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data analisa eoq baru berhasil disimpan.
            </div>";
      }
      ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel barang -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode EOQ</th>
                <th class="center">Kode Barang</th>
                <th class="center">Nama Barang</th>
                <th class="center">Kebutuhan Pertahun</th>
                <th class="center">Biaya<br>Pemesanan</th>  
                <th class="center">Biaya Penyimpanan</th>
                <th class="center">Jumlah Pemesanan Ekonomis</th>
                <th class="center">Satuan</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel barang
            $query = mysqli_query($mysqli, "SELECT a.kode_eoq,a.kode_barang,kebutuhan,biaya_pesan,biaya_penyimpanan,jumlah_pesan_ekonomis,b.kode_barang,b.nama_barang,b.satuan FROM is_analisa_eoq 
                                                      as a INNER JOIN is_barang as b ON a.kode_barang=b.kode_barang ORDER BY kode_eoq DESC")
                                            or die('Ada kesalahan pada query tampil Data Analisa EOQ: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              $biaya_pesan = format_rupiah($data['biaya_pesan']);
              $biaya_penyimpanan = format_rupiah($data['biaya_penyimpanan']);

              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='20' class='center'>$no</td>
                      <td width='80' class='center'>$data[kode_eoq]</td>
                      <td width='180' class='center'>$data[kode_barang]</td>
                      <td width='100' class='center'>$data[nama_barang]</td>
                      <td width='100' class='center'>$data[kebutuhan]</td>
                      <td width='100' class='center'>Rp. $biaya_pesan</td>
                      <td width='100' class='center'>Rp. $biaya_penyimpanan</td>
                      <td width='100' class='center'>$data[jumlah_pesan_ekonomis]</td>
                      <td width='90' class='center'>$data[satuan]</td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->